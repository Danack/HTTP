<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;
use Room11\HTTP\HeadersSet;

class HtmlBody implements Body
{
    private $text;
    private $statusCode;
    private $reasonPhrase;
    
    /** @var HeadersSet  */
    private $headersSet;
    
    public function __construct($text, $statusCode = 200, $reasonPhrase = null)
    {
        $this->text = (string)$text;
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
        
        $this->headersSet = new HeadersSet();
        $this->headersSet->addHeader('Content-Type', 'text/html; charset=UTF-8; charset=utf-8');
        $this->headersSet->addHeader('Content-Length', (string)strlen($this->text));
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
