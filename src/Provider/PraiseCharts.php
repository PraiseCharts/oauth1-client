<?php
namespace PraiseCharts\OAuth1\Client\Provider;

use League\OAuth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Server;

class PraiseCharts extends Server
{
    public function urlTemporaryCredentials(): string
    {
        return 'https://www.praisecharts.com/api/v1.0/oauth/request_token';
    }

    public function urlAuthorization(): string
    {
        return 'https://www.praisecharts.com/api/v1.0/oauth/authorize';
    }

    public function urlTokenCredentials(): string
    {
        return 'https://www.praisecharts.com/api/v1.0/oauth/access_token';
    }

    public function urlUserDetails(): string
    {
        return 'https://www.praisecharts.com/api/v1.0/accounts';
    }

    public function userDetails($data, TokenCredentials $tokenCredentials)
    {
        return $data;
    }

    public function userUid($data, TokenCredentials $tokenCredentials)
    {
        return $data['id'];
    }

    public function userEmail($data, TokenCredentials $tokenCredentials)
    {
        return null;
    }

    public function userScreenName($data, TokenCredentials $tokenCredentials)
    {
        return null;
    }
}
