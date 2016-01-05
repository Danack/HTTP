<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

/**
 * Class NginxFileResponseBody
 * 
 * 
 * @TODO add X-Accel-Buffering and X-Accel-Limit-Rate headers
 */
class NginxFileResponseBody
{
    private $headers = [];


    /**
     * @param NginxAccelFilenameTranslator $nginxAccelFilenameTranslator
     * @param $fileNameToServe
     * @param $contentType
     * @param array $headers
     */
    function __construct(
        NginxAccelFilenameTranslator $nginxAccelFilenameTranslator,
        $fileNameToServe,
        $contentType,
        $headers = [],
        $statusCode = 200
    ) {
        $this->statusCode = $statusCode;
        $this->headers['Content-Type'] = $contentType;
        $this->headers['X-Accel-Redirect'] = $nginxAccelFilenameTranslator->translate($fileNameToServe);
    }

    public function getData()
    {
        return "";
    }

    public function sendData()
    {
        echo "";
    }

    function getHeaders()
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

}
