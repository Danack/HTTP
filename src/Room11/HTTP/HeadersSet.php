<?php

namespace Room11\HTTP;

/**
 * Class HeadersSet
 * Stores a set of headers. Useful for building up the set of
 * headers needed to create a response object, instead of having
 * to use the full response object everywhere.
 *
 * Each header can have multiple values stored for it, to support
 * use-cases which require multiple headers with the same name.
 */
class HeadersSet
{
    private $headers = [];
    private $ucNames = [];

    public static function fromArray($newHeaders)
    {
        $instance = new self();
        foreach ($newHeaders as $name => $values) {
            foreach ($values as $value) {
                $instance->addHeader($name, $value);
            }
        }
    
        return $instance;
    }
    
    
    /**
     * Does the response currently have a value for the specified header field?
     *
     * Header field names are NOT case-sensitive.
     *
     * @param string $name
     * @return bool
     */
    public function hasHeaders($name)
    {
        $ucName = strtoupper($name);

        return isset($this->ucNames[$ucName]);
    }

    /**
     * @param $name
     * @param $value
     */
    public function addHeader($name, $value)
    {
        $ucField = strtoupper($name);
        
        if (isset($this->ucNames[$ucField])) {
            // There's already a case-insensitive match for this field name. Reuse the
            // existing case mapping.
            $name = $this->ucNames[$ucField];
        }

        $this->headers[$name][] = $value;
        $this->ucNames[$ucField] = $name;
    }

    public function merge(HeadersSet $headersSet)
    {
        $instance = clone $this;
        foreach ($headersSet->getAllHeaders() as $name => $values) {
            foreach ($values as $value) {
                $instance->addHeader($name, $value);
            }
        }

        return $instance;
    }
    
    
    /**
     * Retrieve assigned header values for the specified field name
     *
     * @param string $name
     * @throws \Room11\HTTP\HTTPException
     * @return array
     */
    public function getHeaders($name)
    {
        $ucName = strtoupper($name);
        
        if (isset($this->ucNames[$ucName])) {
            $name = $this->ucNames[$ucName];
            return $this->headers[$name];
        }

        throw new HTTPException(
            sprintf('Header field is not assigned: %s', $name)
        );
    }

    /**
     * Remove all entries for a particular header name
     * @param $name
     */
    public function clearHeaders($name)
    {
        $ucName = strtoupper($name);
        if (isset($this->ucNames[$ucName])) {
            $name = $this->ucNames[$ucName];
            unset($this->ucNames[$ucName]);
            unset($this->headers[$name]);
        }
    }

    /**
     * Reset this class to be empty.
     */
    public function clearAllHeaders()
    {
        $this->ucNames = [];
        $this->headers = [];
    }
    
    
    /**
     * @return array
     */
    public function getAllHeaders()
    {
        return $this->headers;
    }
}
