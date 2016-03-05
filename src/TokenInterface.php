<?php

namespace League\Token;

interface TokenInterface
{
    /**
     * Get the token value.
     *
     * @return string
     */
    public function getToken();

    /**
     * Get a copy of the token with a new value.
     *
     * @param string $value
     *
     * @return static
     */
    public function withToken($value);

    /**
     * Get the string representation of the token.
     *
     * @see getToken()
     *
     * @return string
     */
    public function __toString();
}
