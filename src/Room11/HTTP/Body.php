<?php

namespace Room11\HTTP;

interface Body
{
    /**
     * Responsible for outputting entity body data to STDOUT
     */
    public function sendData();

    /**
     * Get the body data as a string. This might be non-conformant
     * @return string
     */
    public function getData();

    /**
     * Return a set of headers for to be used with this body.
     * @return \Room11\HTTP\HeadersSet
     */
    public function getHeadersSet();

    /**
     * @return int The HTTP status code according to RFC2616
     */
    public function getStatusCode();

    /**
     * Return the reason phrase or null if a custom one has not been set.
     * @return string|null
     */
    public function getReasonPhrase();
}
