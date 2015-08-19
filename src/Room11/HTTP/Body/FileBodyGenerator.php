<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

class FileBodyGenerator
{
    private $response;
    
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
