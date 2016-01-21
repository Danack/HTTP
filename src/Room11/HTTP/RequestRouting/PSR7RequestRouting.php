<?php

namespace Room11\HTTP\RequestRouting;

use Room11\HTTP\RequestRouting;
use Psr\Http\Message\ServerRequestInterface;

class PSR7RequestRouting implements RequestRouting
{
    /** @var ServerRequestInterface  */
    private $request;

    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return string What method
     */
    public function getMethod()
    {
        return $this->request->getMethod();
    }

    /**
     * @return string The path component of the request
     */
    public function getPath()
    {
        return $this->request->getUri()->getPath();
    }
}
