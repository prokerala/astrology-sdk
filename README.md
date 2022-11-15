# Getting Started with Prokerala Astrology API

Prokerala Astrology SDK provides convenient access to Prokerala Astrology API for applications developed in PHP. [Prokerala API](https://api.prokerala.com) integration helps you generate custom [horoscope](https://api.prokerala.com/demo/kundli.php), perform [horoscope matching](https://api.prokerala.com/demo/kundli-matching.php), check [mangal dosha](https://api.prokerala.com/demo/mangal-dosha.php), [panchang](https://api.prokerala.com/demo/panchang.php) and [much more](https://api.prokerala.com/demo).

> We have open sourced the code for our [API demo](https://api.prokerala.com/demo/) at [prokerala/astrology-api-demo](https://github.com/prokerala/astrology-api-demo). 

## Requirements

PHP needs to be a minimum version of PHP 8.0

## Installation

> **If you prefer to work with the JSON response directly, please checkout our dependency free [minimal PHP Client example](https://github.com/prokerala/astrology-api-client-example/tree/master/php) that calls the API directly.**

### Using composer (recommended)

This is the recommended method for installation of the SDK.

#### Quick Installation

If you have `composer` already installed, and just want to get started quickly, the following command will install the SDK and its dependencies:

```sh
composer require prokerala/astrology-sdk:^1.0 nyholm/psr7 guzzlehttp/guzzle symfony/cache
```

That's it. The SDK is now ready to use. You can skip to the **Usage** section below.

#### Detailed Instructions

If you do not have `composer` already installed, you can install it with the following command.

```sh
curl -sS https://getcomposer.org/installer | php
```

The current version of the SDK no longer ships with an HTTP client, instead depends on external implementations of `PSR-17` ([HTTP Message factory](https://www.php-fig.org/psr/psr-17/)) and `PSR-18` ([HTTP client](https://www.php-fig.org/psr/psr-18/)). You may choose any implementation of [PSR-17](https://packagist.org/providers/psr/http-factory-implementation) and [PSR-18](https://packagist.org/providers/php-http/client-implementation), for example, the following command installs `nyholm/psr7` for `PSR-17` and Guzzle HTTP client for `PSR-18`.

```sh
composer require nyholm/psr7 guzzlehttp/guzzle
```

Optionally, you can pass an implementation of `PSR-16` Simple Cache interface for caching the access token and responses. As before, you can choose any implementation of [PSR-16](https://packagist.org/providers/psr/simple-cache-implementation). The following command will install `symfony/cache`.

```sh
composer require symfony/cache
```


Now that you have all the dependencies installed, install the SDK by running the following command.

```sh
composer require prokerala/astrology-sdk:^1.0
```

### Manual Installation

If you are not using composer, download the latest release from the releases section. You should download the zip file. After that include autoload.php in your application and you can use the API as usual.

For further help, Please visit our [documentation](https://api.prokerala.com/docs)

## Usage

This SDK is powering our API demo page. The source code of the demos are open source and available on a separate [GitHub repostiory](https://github.com/prokerala/astrology-api-demo).

```php
<?php

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Service\MangalDosha;
use Prokerala\Common\Api\Authentication\Oauth2;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

# Include composer autoloader
include __DIR__.'/vendor/autoload.php';

# Create the PSR-17 Factory. The following line creates a PSR-17 factory using
# nyholm/psr7. If you are using a different implementation, update accordingly.
$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

# Create the PSR-18 HTTP Client
$httpClient = new \GuzzleHttp\Client();

# Create the PSR-16 Cache. Even though the cache parameter is optional, it is
# highly recommended to pass a cache to Oauth2, to improve performance.
$cache = new \Symfony\Component\Cache\Psr16Cache(
    new \Symfony\Component\Cache\Adapter\FilesystemAdapter()
);

$authClient = new Oauth2('YOUR_CLIENT_ID', 'YOUR_CLIENT_SECRET', $httpClient, $psr17Factory, $psr17Factory, $cache);

$client = new Client($authClient, $httpClient, $psr17Factory);
$input = [
    'datetime' => '1967-08-29T09:00:00+05:30',
    'latitude' => '19.0821978',
    'longitude' => '72.7411014', // Mumbai
];

$datetime = new DateTime($input['datetime']);
$tz = $datetime->getTimezone();

$location = new Location($input['latitude'], $input['longitude'], 0, $tz);

try {
    $method = new MangalDosha($client);
    $result = $method->process($location, $datetime);

    $mangalDoshaResult = [
        'has_mangal_dosha' => $result->hasDosha(),
        'description' => $result->getDescription(),
    ];

    print_r($mangalDoshaResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

```

Please check out our [API Demo](https://api.prokerala.com/demo) for a sample implementation using the SDK. The source code for the demo is available under the GitHub repository [prokerala/astrology-api-demo](https://github.com/prokerala/astrology-api-demo).

## License

Copyright &copy; 2019-2022 [Ennexa Technologies Private Limited](https://www.ennexa.com). The Prokerala [Astrology](https://www.prokerala.com/astrology/) API PHP SDK is released under the [MIT License](https://github.com/prokerala/astrology-sdk/blob/master/LICENSE).
