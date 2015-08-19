<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

class EmptyBody implements Body
{
    public function __construct()
    {
    }

    public function __toString()
    {
        return '';
    }
    
    public function __invoke()
    {
        return '';
    }

    public function getHeaders()
    {
        return [];
    }
}
