<?php

namespace Room11\HTTP\Body;

class NginxAccelFilenameTranslator
{
    function __construct()
    {

    }

    /**
     * Converts a real file name into a virtual filename
     * @param $filename
     */
    function translate($filename)
    {
        return str_replace($this->storagePath . "/cache", '/protected_files', $filename);
    }
}
