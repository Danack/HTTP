<?php

namespace Room11\HTTP\VariableMap;

use Room11\HTTP\VariableMap;
use Psr\Http\Message\ServerRequestInterface;

class PSR7VariableMap implements VariableMap
{
    /** @var ServerRequestInterface  */
    private $serverRequest;
    
    public function __construct(ServerRequestInterface $serverRequest)
    {
        $this->serverRequest = $serverRequest;
    }
    

    public function getVariable($variableName, $default = false, $minimum = false, $maximum = false)
    {
        $value = $default;
        $queryParams = $this->serverRequest->getQueryParams();
        if (array_key_exists($variableName, $queryParams)) {
            $value = $queryParams[$variableName];
        }

        $bodyParams = $this->serverRequest->getParsedBody();
        if (is_array($bodyParams) && array_key_exists($variableName, $bodyParams)) {
            $value = $bodyParams[$variableName];
        }

        if ($minimum !== false) {
            if ($value < $minimum) {
                $value = $minimum;
            }
        }

        if ($maximum !== false) {
            if ($value > $maximum) {
                $value = $maximum;
            }
        }

        return $value;
    }
}
