<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;
use Room11\HTTP\HeadersSet;

/**
 * Class BlobBody
 * Allows you to return binary data as a response e.g.
 * for an image generated in memory.
 * @package Room11\HTTP\Body
 */
class BlobBody implements Body
{
    private $data;
    private $statusCode;

    /** @var HeadersSet  */
    private $headersSet;

    public function __construct($filename, $data, $mimeType = null, $headers = [], $statusCode = 200)
    {
        $this->data = $data;
        $this->statusCode = $statusCode;
        $this->headersSet = new HeadersSet();
        $this->headersSet->addHeader('Content-Length', (string)strlen($data));
        $this->headersSet->addHeader('Content-Disposition', 'filename='.$filename);
        if ($mimeType) {
             $this->headersSet->addHeader('Content-Type', $mimeType);
        }
        
        foreach ($headers as $name => $value) {
            $this->headersSet->addHeader($name, $value);
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function sendData()
    {
        echo $this->data;
    }
    
    public function getHeadersSet()
    {
        return $this->headersSet;
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
