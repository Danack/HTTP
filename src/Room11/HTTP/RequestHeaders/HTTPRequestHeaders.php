<?php


namespace Room11\HTTP\RequestHeaders;

use Room11\HTTP\RequestHeaders;
use Psr\Http\Message\ServerRequestInterface;

class HTTPRequestHeaders implements RequestHeaders
{
    /**
     * @var ServerRequestInterface
     */
    private $request;
    
    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }
    
    public function getHeaders($name)
    {
        return $this->request->getHeader($name);
    }
    
    public function getAllHeaders()
    {
        return $this->request->getHeaders();
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
