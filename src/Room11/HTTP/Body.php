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
     * Return an array of headers to be sent prior to entity body output
     */
    public function getHeaders();

    /**
     * @return int The HTTP status code according to RFC2616
     */
    public function getStatusCode();
}
