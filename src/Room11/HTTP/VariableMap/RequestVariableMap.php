<?php

namespace Tier\VariableMap;

use Room11\HTTP\Request;
use Room11\HTTP\VariableMap;

/**
 * Class RequestVariableMap
 * An implementation of VariableMap that uses a HTTP Request as the input. 
 */
class RequestVariableMap implements VariableMap
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @inheritdoc
     */
    public function getVariable($variableName, $default = false, $minimum = false, $maximum = false)
    {
        $value = $default;
        
        if ($this->request->hasQueryParameter($variableName)) {
            $value = $this->request->getQueryParameter($variableName);
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
