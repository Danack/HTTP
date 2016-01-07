<?php


namespace Room11\HTTP\RequestHeaders;

use Room11\HTTP\HTTPException;
use Room11\HTTP\RequestHeaders;

class ArrayRequestHeaders implements RequestHeaders
{
    private $headers;
    
    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }
    
    public function getAllHeaders()
    {
        return $this->headers;
    }

    public function hasHeader($field)
    {
        return array_key_exists($field, $this->headers);
    }
    
    public function getHeader($field)
    {
        if (array_key_exists($field, $this->headers) === true) {
            return $this->headers[$field][0];
        }
        
        throw new HTTPException("headers do not contain anything for '$field'");
    }
    
    
    public function getHeaders($name)
    {
        if (array_key_exists($name, $this->headers) === true) {
            return $this->headers[$name];
        }
        
        throw new HTTPException("headers do not contain anything for '$name'");
    }
}
