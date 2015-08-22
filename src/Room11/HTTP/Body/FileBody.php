<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;
use Room11\HTTP\HTTPException;

class FileBody implements Body
{
    private $headers = [];
    private $fileHandle;

    public function __construct($path, $contentType, $headers = [])
    {
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
        $this->headers['Content-Length'] = $statInfo['size'];
        if ($contentType) {
            $this->headers["Content-Type"] = $contentType;
        }
        
        //// TODO - this is not safe, needs to be encode by the appropriate
        // rfc scheme
        //$this->headers["Content-Disposition:"] =" filename=".$this->filename;
        $this->headers = array_merge($this->headers, $headers); 
    }

    public function __invoke()
    {   
        if (@fpassthru($this->fileHandle) === false) {
            throw new HTTPException(
                sprintf("FileBody could not fpassthru filehandle")
            );
        }
    }

    public function getHeaders()
    {
        return $this->headers;
    }
}
