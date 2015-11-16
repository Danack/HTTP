<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

class HtmlBody implements Body
{
    private $text;
    private $statusCode;
    
    public function __construct($text, $statusCode = 200)
    {
        $this->text = (string)$text;
        $this->statusCode = $statusCode;
    }

    public function __toString()
    {
        return $this->text;
    }
    
    public function __invoke()
    {
        return $this->text;
    }

    public function getHeaders()
    {
        return [
            'Content-Type' => 'text/html; charset=UTF-8; charset=utf-8',
            'Content-Length' => strlen($this->text)
        ];
    }

    /**
     * @inheritdoc
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
