<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;
use Room11\HTTP\HeadersSet;

class EmptyBody implements Body
{
    private $statusCode;
    private $reasonPhrase;
    
    public function __construct($statusCode, $reasonPhrase = null)
    {
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
    }

    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }

    public function getData()
    {
        return "";
    }

    public function sendData()
    {
    }
    
    public function getHeadersSet()
    {
        return new HeadersSet();
    }
    
    /**
     * @inheritdoc
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
