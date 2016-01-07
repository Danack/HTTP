<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;
use Room11\HTTP\HeadersSet;

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
    public function __construct(
        NginxAccelFilenameTranslator $nginxAccelFilenameTranslator,
        $fileNameToServe,
        $contentType,
        $headers = [],
        $statusCode = 200
    ) {
        $this->statusCode = $statusCode;
        
        $this->headersSet = new HeadersSet();
        
        $this->headersSet->addHeader('Content-Type', $contentType);
        $this->headersSet->addHeader(
            'X-Accel-Redirect',
            $nginxAccelFilenameTranslator->translate($fileNameToServe)
        );
    }

    public function getReasonPhrase()
    {
        return null;
    }
    
    public function getData()
    {
        return "";
    }

    public function sendData()
    {
        echo "";
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
