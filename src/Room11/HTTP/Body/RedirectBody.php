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
    
    public function __construct($text, $location)
    {
        $this->text = $text;
        $this->location = $location;
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
