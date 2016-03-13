<?php

namespace League\Token\OAuth2;

use DateTimeImmutable;
use DateTimeInterface;
use League\Token\TokenInterface;
use League\Token\Tool;

class AccessToken implements TokenInterface
{
    use Tool\DateHelperTrait;
    use Tool\StringifyTokenTrait;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var string
     */
    private $tokenType;

    /**
     * @var DateTimeImmutable
     */
    private $expiresAt;

    /**
     * @var RefreshToken
     */
    private $refreshToken;

    /**
     * @var array
     */
    private $scope;

    /**
     * @param string $token
     * @param string $type
     * @param integer $expiresIn
     */
    public function __construct($token, $type, $expiresIn = null)
    {
        $this->accessToken = $token;
        $this->tokenType = $type;

        if ($expiresIn) {
            $this->expiresAt = $this->getDateFromTimestamp(time() + $expiresIn);
        }
    }

    /**
     * @inheritDoc
     */
    public function getToken()
    {
        return $this->accessToken;
    }

    /**
     * @inheritDoc
     */
    public function withToken($token)
    {
        $copy = clone $this;
        $copy->accessToken = $token;

        return $copy;
    }

    /**
     * Get the type of token.
     *
     * @return string
     */
    public function getType()
    {
        return $this->tokenType;
    }

    /**
     * Get a copy and set the token type.
     *
     * @param string $type
     *
     * @return static
     */
    public function withType($type)
    {
        $copy = clone $this;
        $copy->tokenType = $type;

        return $copy;
    }

    /**
     * Get the token expiration date.
     *
     * @return DateTimeImmutable|null
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Get a copy and set the token expiration date.
     *
     * @param DateTimeInterface $time
     *
     * @return static
     */
    public function withExpiresAt(DateTimeInterface $time)
    {
        $copy = clone $this;
        $copy->expiresAt = $this->getImmutableDate($time);

        return $copy;
    }

    /**
     * Get the token expiration date as a UNIX timestamp.
     *
     * @return integer|null
     */
    public function getExpiresTimestamp()
    {
        $date = $this->getExpiresAt();

        if (empty($date)) {
            return null;
        }

        return $date->getTimestamp();
    }

    /**
     * Is the token expired?
     *
     * @return boolean
     */
    public function isExpired()
    {
        $timestamp = $this->getExpiresTimestamp();

        if ($timestamp === null) {
            return false;
        }

        return $timestamp < time();
    }

    /**
     * Get the refresh token.
     *
     * @return RefreshToken|null
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Get a copy and set the refresh token.
     *
     * @param RefreshToken|string $token
     *
     * @return static
     */
    public function withRefreshToken($token)
    {
        if (!$token instanceof RefreshToken) {
            $token = new RefreshToken($token);
        }

        $copy = clone $this;
        $copy->refreshToken = $token;

        return $copy;
    }

    /**
     * Get the token scope.
     *
     * @return array
     */
    public function getScope()
    {
        return (array) $this->scope;
    }

    /**
     * Get a copy and set the scope.
     *
     * @param array $scope
     *
     * @return static
     */
    public function withScope(array $scope)
    {
        $copy = clone $this;
        $copy->scope = $scope;

        return $copy;
    }
}
