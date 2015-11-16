<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

class EmptyBody implements Body
{
    public function __construct($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function __invoke()
    {
        return;
    }

    public function getHeaders()
    {
        return [];
    }
    
    /**
     * @inheritdoc
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
