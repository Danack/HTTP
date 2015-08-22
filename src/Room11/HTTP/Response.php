<?php

namespace Room11\HTTP;

interface Response //implements \ArrayAccess
{
    /**
     * Assign the response status code (default: 200)
     *
     * @param int $statusCode
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setStatus($statusCode);

    /**
     * Assign an optional reason phrase (e.g. Not Found) to accompany the status code
     *
     * @param string $reasonPhrase
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setReasonPhrase($reasonPhrase);

    /**
     * Set multiple headers from a key-value array
     *
     * Existing values matching the specified field are replaced.
     * Header field names are NOT case-sensitive.
     *
     * @param array
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setAllHeaders(array $headerArray);

    /**
     * Assign a header value
     *
     * Existing values matching the specified field are replaced.
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @param string $value
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setHeader($field, $value);

    

    /**
     * Assign multiple raw header lines at once
     *
     * @param array<string> An array of header lines of the form "My-Header: some value"
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setAllHeaderLines(array $lines);

    /**
     * Assign a raw header line of the form "Some-Header-Field: my value"
     *
     * Existing values matching the header line's field are replaced by the new value.
     * Header field names are NOT case-sensitive.
     *
     * @param string $line
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setHeaderLine($line);

    /**
     * Append multiple raw header lines of the form "Some-Header-Field: my value"
     *
     * @param array $lines
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function addAllHeaderLines(array $lines);

    /**
     * Appends a raw header line of the form "Some-Header-Field: my value"
     *
     * The header's value is appended to existing headers with the same field name.
     * Header field names are NOT case-sensitive.
     *
     * @param string $line
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function addHeaderLine($line);



    /**
     * Append a header value
     *
     * The header value is appended to existing fields with the same name.
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @param string $value
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function addHeader($field, $value);

    /**
     * Does the response currently have a value for the specified header field?
     *
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @return bool
     */
    public function hasHeader($field);
    /**
     * Removes assigned headers for the specified field
     *
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @return Response Returns the current object instance
     */
    public function removeHeader($field);

    /**
     * Removes all assigned headers
     *
     * @return Response Returns the current object instance
     */
    public function removeAllHeaders();

    /**
     * Set a cookie value to be sent with the response.
     *
     * Cookie values will be available upon the client's next request. Extended cookie options
     * beyond the name-value pair may be specified using individual keys in the $options array:
     *
     *     [
     *         'expire' => 0,       // Expiration time (unix timestamp) for this cookie
     *         'path' => '',        // The server path on which the cookie will be available
     *         'domain' => '',      // The domain on which the cookie will be available
     *         'secure' => FALSE,   // Indicates the cookie should only be sent via HTTPS
     *         'httponly' => FALSE  // When TRUE the cookie is only available via the HTTP protocol
     *     ];
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return Response Returns the current object instance
     */
    public function setCookie($name, $value = '', array $options = []);

    /**
     * Same as Response::setCookie except that the cookie value will not be automatically urlencoded
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return Response Returns the current object instance
     */
    public function setRawCookie($name, $value = '', array $options = []);

    /**
     * Has a cookie with this name been assigned to the response?
     *
     * @param string $name
     * @return bool
     */
    public function hasCookie($name);

    /**
     * Remove an assigned cookie matching the specified name
     *
     * @param string $name
     * @return Response Returns the current object instance
     */
    public function removeCookie($name);

    /**
     * Get the status code for this response
     *
     * @return int
     */
    public function getStatus();

    /**
     * Get the assigned reason phrase for this response
     *
     * @return string
     */
    public function getReasonPhrase();

    /**
     * Retrieve assigned header values for the specified field
     *
     * If only one value is assigned for the specified field, that scalar value is returned. If
     * multiple values are assigned for the field an array of scalars is returned.
     *
     * @param string $field
     * @throws \DomainException
     * @return string|array
     */
    public function getHeader($field);

    /**
     * Assign a response entity body
     *
     * @param Body $body
     * @return Response Returns the current object instance
     */
    public function setBody(Body $body);

    /**
     * Retrieve an array mapping header field names to their assigned values
     *
     * @return array
     */
    public function getAllHeaders();

    /**
     * Retrieve an array of header strings appropriate for output
     *
     * @return array
     */
    public function getAllHeaderLines();

    /**
     * Retrieve the entity body assigned for this response
     *
     * @return void|string|callable
     */
    public function getBody();

    /**
     * Is an entity body assigned for this response?
     *
     * @return bool
     */
    public function hasBody();

// TODO - These seem quite use-case specific. Should they be in the interface? 
//    /**
//     * Import values from external Response instance
//     *
//     * Calling import() will clear all previously assigned values before assigning those from the
//     * new Response instance.
//     *
//     * @param \Arya\Response $response
//     * @return Response Returns the current object instance
//     */
//    public function import(Response $response);
//
//    public function importArray(array $response);

// TODO - These seem like implementation details
//    /**
//     * Remove all assigned values and reset defaults
//     *
//     * @return Response Returns the current object instance
//     */
//    public function clear();
//
//    public function offsetSet($offset, $value);
//
//    public function offsetExists($offset);
//
//    public function offsetUnset($offset);
//
//    public function offsetGet($offset);
}
