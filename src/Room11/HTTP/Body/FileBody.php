<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;
use Room11\HTTP\HTTPException;
use Room11\HTTP\HeadersSet;

class FileBody implements Body
{
    
    private $fileHandle;
    private $statusCode;
    
    /** @var HeadersSet  */
    private $headersSet;

    public function __construct(
        $path,
        $contentType,
        $headers = [],
        $statusCode = 200,
        $reasonPhrase = null
    ) {
        if (!is_string($path)) {
            throw new HTTPException(
                sprintf('FileBody path must be a string filesystem path; %s specified', gettype($path))
            );
        } elseif (!is_readable($path)) {
            throw new HTTPException(
                sprintf('FileBody path is not readable: %s', $path)
            );
        } elseif (!is_file($path)) {
            throw new HTTPException(
                sprintf('FileBody path is not a file: %s', $path)
            );
        }

        $this->fileHandle = @fopen($path, 'rb');
        
        if (!$this->fileHandle) {
            throw new HTTPException(
                sprintf('FileBody could not open file for reading: %s', $path)
            );
        }

        $statInfo = fstat($this->fileHandle);

        if (!array_key_exists('size', $statInfo)) {
            throw new HTTPException(
                sprintf('FileBody could not determine file size from fstat: %s', $path)
            );
        }

        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
        
        $this->headersSet = new HeadersSet();
        $this->headersSet->addHeader('Content-Length', (string)$statInfo['size']);
        if ($contentType) {
            $this->headersSet->addHeader("Content-Type", $contentType);
        }
        
        // TODO - this is not safe, needs to be encode by the appropriate
        // rfc scheme
        //$this->headers["Content-Disposition:"] =" filename=".$this->filename;
        foreach ($headers as $name => $value) {
            $this->headersSet->addHeader($name, $value);
        }
    }

    public function sendData()
    {
        if (@fpassthru($this->fileHandle) === false) {
            throw new HTTPException(
                sprintf("FileBody could not fpassthru filehandle")
            );
        }
    }
    
    public function getData()
    {
        $bytes = stream_get_contents($this->fileHandle);
        if ($bytes === false) {
            throw new HTTPException(
                sprintf("FileBody could not stream_get_contents filehandle")
            );
        }

        return $bytes;
    }
    
    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
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
}
