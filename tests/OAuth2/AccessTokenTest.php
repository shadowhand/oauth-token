<?php

namespace League\Token\OAuth2;

use DateTime;
use DateTimeImmutable;
use PHPUnit_Framework_TestCase as TestCase;

class AccessTokenTest extends TestCase
{
    /**
     * @var AccessToken
     */
    private $token;

    public function setUp()
    {
        $this->token = new AccessToken(
            'fake_token',
            'Bearer'
        );
    }

    public function testDefaults()
    {
        $this->assertSame('fake_token', $this->token->getToken());
        $this->assertSame('Bearer', $this->token->getType());
        $this->assertSame(null, $this->token->getExpiresTimestamp());
    }

    public function testConstruction()
    {
        $token = new AccessToken(
            'fake_token',
            'Bearer',
            300
        );

        $this->assertGreaterThan(time(), $token->getExpiresTimestamp());
        $this->assertLessThan(time() + 300 + 1, $token->getExpiresTimestamp());
    }

    public function testWithToken()
    {
        $copy = $this->token->withToken('changed');

        $this->assertNotSame($this->token->getToken(), $copy->getToken());
        $this->assertSame('changed', $copy->getToken());
    }

    public function testWithType()
    {
        $copy = $this->token->withType('MAC');

        $this->assertNotSame($this->token->getType(), $copy->getType());
        $this->assertSame('MAC', $copy->getType());
    }

    public function testWithExpiresAt()
    {
        $time = new DateTimeImmutable('tomorrow 9am');
        $copy = $this->token->withExpiresAt($time);

        $this->assertNotSame($this->token->getExpiresAt(), $copy->getExpiresAt());
        $this->assertSame($time, $copy->getExpiresAt());

        $time = new DateTime('tomorrow 9am');
        $simple = $this->token->withExpiresAt($time);
        $immutable = $simple->getExpiresAt();

        $this->assertNotSame($time, $immutable);
        $this->assertInstanceOf(DateTimeImmutable::class, $immutable);
        $this->assertSame($time->getTimestamp(), $immutable->getTimestamp());
    }

    public function testIsExpired()
    {
        // By default the token has no expiration
        $this->assertNull($this->token->getExpiresAt());
        $this->assertFalse($this->token->isExpired());

        $date = new DateTimeImmutable('tomorrow 9am');
        $token = $this->token->withExpiresAt($date);

        $this->assertFalse($token->isExpired());

        $date = new DateTimeImmutable('2001-01-01');
        $token = $this->token->withExpiresAt($date);

        $this->assertTrue($token->isExpired());
    }

    public function testWithRefreshToken()
    {
        $this->assertNull($this->token->getRefreshToken());

        $refresh = new RefreshToken('refresh');
        $token = $this->token->withRefreshToken($refresh);

        $this->assertSame($refresh, $token->getRefreshToken());

        $token = $this->token->withRefreshToken('changed');

        $this->assertNotSame($refresh, $token->getRefreshToken());
        $this->assertSame('changed', $token->getRefreshToken()->getToken());
    }

    public function testWithScope()
    {
        $this->assertSame([], $this->token->getScope());

        $token = $this->token->withScope(['test']);

        $this->assertSame(['test'], $token->getScope());
    }

    public function testStringify()
    {
        $this->assertSame($this->token->getToken(), (string) $this->token);
    }
}
