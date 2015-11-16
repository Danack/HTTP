<?php


namespace Room11\HTTP\Request;

use Room11\HTTP\RequestHeaders;

class HTTPRequestHeaders implements RequestHeaders
{
    /**
     * @var Request
     */
    private $request;
    
    public function __construct(\Room11\HTTP\Request\Request $request)
    {
        $this->request = $request;
    }
    
    public function getAllHeaders()
    {
        return $this->request->getAllHeaders();
    }
    
    public function hasHeader($field)
    {
        return $this->request->hasHeader($field);
    }
    
    public function getHeader($field)
    {
        return $this->request->getHeader($field);
    }
}
