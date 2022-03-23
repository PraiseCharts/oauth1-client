<?php

namespace PraiseCharts\OAuth1\Client\Test;

use PraiseCharts\OAuth1\Client\Provider\PraiseCharts;
use GuzzleHttp\ClientInterface;
use League\OAuth1\Client\Credentials\ClientCredentials;
use League\OAuth1\Client\Credentials\TemporaryCredentials;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\TestCase;

class PraiseChartsTest extends TestCase
{
    /**
     * @var PraiseCharts
     */
    protected $provider;

    protected function setUp()
    {
        $this->provider = new PraiseCharts([
            'identifier' => 'identifier',
            'secret' => 'mysecret',
            'callback_uri' => 'callback_uri',
        ]);
    }

    public function testCreatingWithArray()
    {
        $server = new PraiseCharts($this->getMockClientCredentials());

        $credentials = $server->getClientCredentials();
        $this->assertInstanceOf('League\OAuth1\Client\Credentials\ClientCredentialsInterface', $credentials);
        $this->assertEquals('identifier', $credentials->getIdentifier());
        $this->assertEquals('mysecret', $credentials->getSecret());
        $this->assertEquals('callback_uri', $credentials->getCallbackUri());
    }

    public function testCreatingWithObject()
    {
        $credentials = new ClientCredentials();
        $credentials->setIdentifier('myidentifier');
        $credentials->setSecret('mysecret');
        $credentials->setCallbackUri('http://app.dev/');

        $server = new PraiseCharts($credentials);

        $this->assertEquals($credentials, $server->getClientCredentials());
    }

    public function testGettingDefaultAuthorizationUrl()
    {
        $server = new PraiseCharts($this->getMockClientCredentials());

        $expected = 'https://www.praisecharts.com/api/v1.0/oauth/authorize?oauth_token=foo';

        $this->assertEquals($expected, $server->getAuthorizationUrl('foo'));

        $credentials = $this->getMockBuilder(TemporaryCredentials::class)
            ->disableOriginalConstructor()
            ->getMock();

        $credentials->method('getIdentifier')->willReturn('foo');

        $this->assertEquals($expected, $server->getAuthorizationUrl($credentials));
    }

    protected function getMockClientCredentials()
    {
        return [
            'identifier' => 'identifier',
            'secret' => 'mysecret',
            'callback_uri' => 'callback_uri',
        ];
    }
}
