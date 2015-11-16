<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

class TextBody implements Body
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var int
     */
    private $statusCode;
    
    public function __construct($text, $statusCode = 200)
    {
        $this->text = $text;
        $this->statusCode = $statusCode;
    }
    
    /**
     * Responsible for outputting entity body data to STDOUT
     */
    public function __invoke()
    {
        echo  $this->text;
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
    public function getHeaders()
    {
        return [
            'Content-Type' => 'text/plain',
            'Content-Length' => strlen($this->text)
        ];
    }
}
