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
    
    public function __construct($text, $location, $statusCode)
    {
        $this->text = $text;
        $this->location = $location;
        $this->statusCode = $statusCode;
    }

    /**
     * @inheritdoc
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    /**
     * Responsible for outputting entity body data to STDOUT
     */
    public function __invoke()
    {
        return $this->text;
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
