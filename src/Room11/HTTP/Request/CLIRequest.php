<?php


namespace Room11\HTTP\Request;

use Room11\HTTP\HTTPException;

class CLIRequest implements \Room11\HTTP\Request
{
    private $path;
    
    public function __construct($path) {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getProtocol()
    {
        return "1.1";
    }
    
    /**
     * Did the request contain the specified header field?
     *
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @return bool
     */
    public function hasHeader($field)
    {
        // TODO: Implement hasHeader() method.
    }

    public function getHeader($field)
    {
        // TODO: Implement getHeader() method.
    }

    public function getAllHeaders()
    {
        // TODO: Implement getAllHeaders() method.
    }

    public function hasQueryParameter($field)
    {
        // TODO: Implement hasQueryParameter() method.
    }

    /**
     * Retrieve the value of a query parameter
     *
     * If the specified query parameter does not exist a \DomainException is thrown. If uncaught
     * this exception results in a 500 Internal Server Error being relayed to the user.
     *
     * @param string $field
     * @throws HTTPException If query field does not exist in the request
     * @return array|string
     */
    public function getQueryParameter($field)
    {
        // TODO: Implement getQueryParameter() method.
    }

    /**
     * A convenience method for retrieving a query parameter with the expectation that the value is an array
     *
     * An uncaught UserInputException will result in a 400 Invalid Query Parameter response being
     * returned to the user.
     *
     * @throws HTTPException If query field does not exist in the request
     * @param string $field
     * @return array
     */
    public function getArrayQueryParameter($field)
    {
        // TODO: Implement getArrayQueryParameter() method.
    }

    /**
     * A convenience method for retrieving a query parameter with the expectation that the value is a string
     *
     * An uncaught UserInputException will result in a 400 Invalid Query Parameter response being
     * returned to the user.
     *
     * @throws HTTPException If query field does not exist in the request
     * @param string $field
     * @return string
     */
    public function getStringQueryParameter($field)
    {
        // TODO: Implement getStringQueryParameter() method.
    }

    public function getAllQueryParameters()
    {
        // TODO: Implement getAllQueryParameters() method.
    }

    public function hasFormField($field)
    {
        // TODO: Implement hasFormField() method.
    }

    /**
     * Retrieve the value of a submitted form field
     *
     * If the specified form field does not exist a \DomainException is thrown. If uncaught
     * this exception results in a 500 Internal Server Error being relayed to the user.
     *
     * @param string $field
     * @throws \DomainException If form field does not exist in the request
     * @return string|array
     */
    public function getFormField($field)
    {
        // TODO: Implement getFormField() method.
    }

    /**
     * A convenience method for retrieving a form field with the expectation that the value is an array
     *
     * An uncaught UserInputException will result in a 400 Invalid Query Parameter response being
     * returned to the user.
     *
     * @throws HTTPException If form field does not exist in the request
     * @param string $field
     * @return array
     */
    public function getArrayFormField($field)
    {
        // TODO: Implement getArrayFormField() method.
    }

    /**
     * A convenience method for retrieving a form field with the expectation that the value is a string
     *
     * An uncaught UserInputException will result in a 400 Invalid Query Parameter response being
     * returned to the user.
     *
     * @throws HTTPException If form field does not exist in the request
     * @param string $field
     * @return string
     */
    public function getStringFormField($field)
    {
        // TODO: Implement getStringFormField() method.
    }

    public function getAllFormFields()
    {
        // TODO: Implement getAllFormFields() method.
    }

    public function hasFormFile($field)
    {
        // TODO: Implement hasFormFile() method.
    }

    public function getFormFile($field)
    {
        // TODO: Implement getFormFile() method.
    }

    public function getAllFormFiles()
    {
        // TODO: Implement getAllFormFiles() method.
    }

    public function hasCookie($field)
    {
        // TODO: Implement hasCookie() method.
    }

    public function getCookie($field)
    {
        // TODO: Implement getCookie() method.
    }

    public function getAllCookies()
    {
        // TODO: Implement getAllCookies() method.
    }

    public function hasBody()
    {
        // TODO: Implement hasBody() method.
    }

    public function getBody()
    {
        // TODO: Implement getBody() method.
    }

    public function getMethod()
    {
        return "GET";
    }

    public function getBodyStream()
    {
        // TODO: Implement getBodyStream() method.
    }

    public function isEncrypted()
    {
        // TODO: Implement isEncrypted() method.
    }


}
