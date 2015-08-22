<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

class DataBody implements Body
{
    private $data;
    private $headers;

    function __construct($filename, $data, $mimeType = null, $headers = [])
    {
        if ($mimeType) {
             $this->headers['Content-Type'] = $mimeType;
        }
        $this->headers['Content-Length'] = strlen($data);
        $this->headers['Content-Disposition'] = 'filename='.$filename;
        $this->data = $data;
        $this->headers = array_merge($this->headers, $headers);
    }
    
    function __invoke()
    {
        echo $this->data;
    }
    
    public function getHeaders()
    {
        return $this->headers;
    }
}

