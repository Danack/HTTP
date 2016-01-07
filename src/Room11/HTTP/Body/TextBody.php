<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;
use Room11\HTTP\HeadersSet;

class TextBody implements Body
{
    /** @var string */
    private $text;

    /** @var int */
    private $statusCode;
    
    private $reasonPhrase;

    public function __construct($text, $statusCode = 200, $reasonPhrase = null)
    {
        $this->text = $text;
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
        
        $this->headersSet = new HeadersSet();
        $this->headersSet->addHeader('Content-Type', 'text/plain');
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

    /**
     * @inheritdoc
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    /**
     * Return an optional array of headers to be sent prior to entity body output
     */
    public function getHeadersSet()
    {
        return $this->headersSet;
    }
}
