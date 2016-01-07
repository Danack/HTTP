<?php


namespace Room11\HTTP;

interface RequestHeaders
{
    public function hasHeader($field);
    
    public function getHeader($field);
    
    public function getHeaders($name);

    public function getAllHeaders();
}
