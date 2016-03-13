<?php

namespace League\Token\OAuth2;

use PHPUnit_Framework_TestCase as TestCase;

class RefreshTokenTest extends TestCase
{
    /**
     * @var RefreshToken
     */
    private $token;

    public function setUp()
    {
        $this->token = new RefreshToken('fake_token');
    }

    public function testWithToken()
    {
        $this->assertSame('fake_token', $this->token->getToken());

        $token = $this->token->withToken('changed');

        $this->assertNotSame($token->getToken(), $this->token->getToken());
        $this->assertSame('changed', $token->getToken());
    }

    public function testStringify()
    {
        $this->assertSame($this->token->getToken(), (string) $this->token);
    }
}
