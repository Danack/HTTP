<?php

namespace Room11\HTTP\Body;

/**
 * Class NginxAccelFilenameTranslator
 *
 * Nginx allows static files to be served from the Nginx context, rather
 * than having to be served inside PHP. This allows for you to do things like
 * authenticate a user in PHP, but then serve a large file to them from nginx.
 *
 *
 * Nginx Config
 * ============
 *
 * location /protected/ {
 *    internal;
 *    alias   /some/path/; # note the trailing slash
 * }
 *
 * Header
 * ======
 *
 * X-Accel-Redirect: /protected/iso.img;
 *
 * nginx will serve the file from /some/path/protected/iso.img
 *
 *
 * See https://www.nginx.com/resources/wiki/start/topics/examples/xsendfile/
 * for more information
 */
class NginxAccelFilenameTranslator
{

    /**
     * @param $storagePath string The absolute path to the directory
     * that files will be served from e.g. "/some/path"
     */
    public function __construct($storagePath, $internalPath)
    {
        $this->storagePath = $storagePath;
        $this->internalPath = $internalPath;
    }

    /**
     * Converts a real file name into a virtual filename
     *
     * @param $filename string The absolute path to the
     */
    public function translate($filename)
    {
        return str_replace($this->storagePath, '/protected_files', $filename);
    }
}
