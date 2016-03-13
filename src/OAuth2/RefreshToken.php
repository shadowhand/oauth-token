<?php

namespace League\Token\OAuth2;

use League\Token\TokenInterface;
use League\Token\Tool;

class RefreshToken implements TokenInterface
{
    use Tool\StringifyTokenTrait;

    /**
     * @var string
     */
    private $refreshToken;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->refreshToken = $token;
    }

    public function getToken()
    {
        return $this->refreshToken;
    }

    public function withToken($token)
    {
        $copy = clone $this;
        $copy->refreshToken = $token;

        return $copy;
    }
}
