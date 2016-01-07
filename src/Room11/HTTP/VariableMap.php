<?php

namespace Room11\HTTP;

/**
 * Interface VariableMap
 *
 * Used to decouple controllers from the Request object.
 */
interface VariableMap
{
    /**
     * @param string $variableName The variable to fetch.
     * @param bool $default A default value to use if the variable is not available
     * @param bool|int|float $minimum If set and not false, the value will be at least this value
     *
     * @param bool|int $maximum If set and not false, the value will be at most this value
     * @return mixed The value of the variable (or default) restricted by minimum and maximum.
     */
    public function getVariable($variableName, $default = false, $minimum = false, $maximum = false);
}
