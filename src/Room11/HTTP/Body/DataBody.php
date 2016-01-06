<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

/**
 * Class BlobBody
 * Allows you to return binary data as a response e.g.
 * for an image generated in memory.
 * @package Room11\HTTP\Body
 */
class BlobBody implements Body
{
    private $data;
    private $headers;
    private $statusCode;

    function __construct($filename, $data, $mimeType = null, $headers = [], $statusCode = 200)
    {
        if ($mimeType) {
             $this->headers['Content-Type'] = $mimeType;
        }
        $this->headers['Content-Length'] = strlen($data);
        $this->headers['Content-Disposition'] = 'filename='.$filename;
        $this->data = $data;
        $this->headers = array_merge($this->headers, $headers);
        $this->statusCode = $statusCode;
    }

    public function getData()
    {
        return $this->data;
    }

    public function sendData()
    {
        echo $this->data;
    }
    
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @inheritdoc
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    public function getReasonPhrase()
    {
        return null;
    }
}

