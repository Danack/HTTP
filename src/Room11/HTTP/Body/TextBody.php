<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

class TextBody implements Body
{
    /**
     * @var string
     */
    private $text;
    
    public function __construct($text)
    {
        $this->text = $text;
    }
    
    /**
     * Responsible for outputting entity body data to STDOUT
     */
    public function __invoke()
    {
        echo  $this->text;
    }

    /**
     * Return an optional array of headers to be sent prior to entity body output
     */
    public function getHeaders()
    {
        return [
            'Content-Type' => 'text/plain',
            'Content-Length' => strlen($this->text)
        ];
    }
}
