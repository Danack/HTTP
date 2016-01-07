<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;
use Room11\HTTP\HTTPException;
use Room11\HTTP\HeadersSet;

class JsonBody implements Body
{
    private $json;
    private $statusCode;
    
    private $headersSet;

    public function __construct($data, $statusCode = 200, $flags = 0, $depth = 512)
    {
        if (PHP_VERSION_ID < 50500 && $depth != 512) {
            throw new HTTPException('depth parameter not available before PHP 5.5');
        }

        if (PHP_VERSION_ID < 50500) {
            $this->json = @json_encode($data, $flags);
        } else {
            $this->json = @json_encode($data, $flags, $depth);
        }

        if (!$this->json) {
            $errorCode = json_last_error();
            $errorMsg = function_exists('json_last_error_msg')
                ? json_last_error_msg()
                : $this->jsonErrorMsg($errorCode);
            throw new HTTPException($errorMsg);
        }
        $this->statusCode = $statusCode;

        $this->headersSet = new HeadersSet();
        $this->headersSet->addHeader('Content-Type', 'application/json; charset=utf-8');
        $this->headersSet->addHeader('Content-Length', (string)strlen($this->json));
    }
    
    public function getReasonPhrase()
    {
        return null;
    }

    private function jsonErrorMsg($errorCode)
    {
        $errors = [
            JSON_ERROR_DEPTH            => 'Maximum stack depth exceeded',
            JSON_ERROR_STATE_MISMATCH   => 'Underflow or the modes mismatch',
            JSON_ERROR_CTRL_CHAR        => 'Unexpected control character found',
            JSON_ERROR_SYNTAX           => 'Syntax error, malformed JSON',
            JSON_ERROR_UTF8             => 'Malformed UTF-8 characters, possibly incorrectly encoded'
        ];

        return isset($errors[$errorCode]) ? $errors[$errorCode] : "Unknown error ({$errorCode})";
    }

    public function getData()
    {
        return $this->json;
    }

    public function sendData()
    {
        echo $this->json;
    }

    public function getHeadersSet()
    {
        return $this->headersSet;
    }
    
    /**
     * @inheritdoc
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
