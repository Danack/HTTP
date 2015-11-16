<?php

namespace Room11\HTTP;

interface Request
{
    public function getPath();

    /**
     * Did the request contain the specified header field?
     *
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @return bool
     */
    public function hasHeader($field);

    public function getHeader($field);

    public function getAllHeaders();

    public function hasQueryParameter($field);

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
    public function getQueryParameter($field);

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
    public function getArrayQueryParameter($field);

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
    public function getStringQueryParameter($field);

    public function getAllQueryParameters();

    public function hasFormField($field);

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
    public function getFormField($field);

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
    public function getArrayFormField($field);

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
    public function getStringFormField($field);

    public function getAllFormFields();

    public function hasFormFile($field);

    public function getFormFile($field);

    public function getAllFormFiles();

    public function hasCookie($field);

    public function getCookie($field);

    public function getAllCookies();

    public function hasBody();

    public function getBody();

    public function getMethod();

    public function getBodyStream();

    public function isEncrypted();
    
    public function getProtocol();
}
