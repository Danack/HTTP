<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

class RedirectBody implements Body
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var
     */
    private $location;
    private $statusCode;
    private $reasonPhrase;

    public function __construct($text, $location, $statusCode, $reasonPhrase = null)
    {
        $this->text = $text;
        $this->location = $location;
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;;
    }
    
    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }

    /**
     * @inheritdoc
     */
    public function getStatusCode()
    {
        return $this->statusCode;
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
     * Return an optional array of headers to be sent prior to entity body output
     */
    public function getHeaders()
    {
        return ['Location' => $this->location];
    }

    public function __toString()
    {
        return $this->text;
    }
}
