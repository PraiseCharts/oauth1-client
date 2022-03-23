# Intuit Provider for OAuth 1.0 Client

This package provides PraiseCharts OAuth 1.0 support for the PHP League's [OAuth 1.0 Client](https://github.com/thephpleague/oauth1-client).

## Installation

To install, use composer:

```
composer require praisecharts/oauth1-client
```

## Usage

Usage is the same as The League's OAuth client, using `PraiseCharts\OAuth1\Client\Server\PraiseCharts` as the provider.

```php
$server = new PraiseCharts\OAuth1\Client\Server\PraiseCharts(array(
    'identifier'   => 'your-identifier',
    'secret'       => 'your-secret',
    'callback_uri' => 'http://your-callback-uri/',
));
```
