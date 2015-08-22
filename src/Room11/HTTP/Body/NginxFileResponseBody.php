<?php

namespace Room11\HTTP\Body;

use Room11\HTTP\Body;

class NginxFileResponseBody
{
    private $headers = [];

    function __construct(
        NginxAccelFilenameTranslator $nginxAccelFilenameTranslator,
        $fileNameToServe,
        $contentType,
        $headers = []
    ) {
        $this->headers['Content-Type'] = $contentType;
        $this->headers['X-Accel-Redirect'] = $nginxAccelFilenameTranslator->translate($fileNameToServe);
    }

    function __invoke() {
        echo "";
    }

    function getHeaders()
    {
        return $this->headers;
    }

}
