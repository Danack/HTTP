<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

class HtmlBody implements Body
{
    private $text;
    private $statusCode;
    private $reasonPhrase;
    
    public function __construct($text, $statusCode = 200, $reasonPhrase = null)
    {
        $this->text = (string)$text;
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
    }
    
    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }
    

    public function getData()
    {
        return $this->text;
    }

    public function sendData()
    {
        echo $this->text;
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
