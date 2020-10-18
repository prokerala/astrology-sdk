# Getting Started with Prokerala Astrology API

Prokerala Astrology SDK provides convenient access to Prokerala Astrology API for applications developed in PHP. [Prokerala API](https://api.prokerala.com) integration helps you generate custom [horoscope](https://api.prokerala.com/demo/kundli.php), perform [horoscope matching](https://api.prokerala.com/demo/kundli-matching.php), check [mangal dosha](https://api.prokerala.com/demo/mangal-dosha.php), [panchang](https://api.prokerala.com/demo/panchang.php) and [much more](https://api.prokerala.com/demo).

## Requirements

PHP needs to be a minimum version of PHP 5.6.0.

## Installation

### Using composer (recommended)

This is the recommended method for installation of the SDK.

#### Quick Installation

If you have `composer` already installed, and just want to get started quickly, the following command will install the SDK and its dependencies:

```
composer require prokerala/astrology-sdk:^0.4 nyholm/psr7 guzzlehttp/guzzle
```

That's it. The SDK is now ready to use. You can skip to the **Usage** section below.

#### Detailed Instructions

If you do not have `composer` already installed, you can install it with the following command.

```
curl -sS https://getcomposer.org/installer | php
```

To install the SDK using composer, run

```
composer require prokerala/astrology-sdk:^0.4

```

The current version of the SDK no longer ships with an HTTP client, instead depends on external implementations of `PSR-17` ([HTTP Message factory](https://www.php-fig.org/psr/psr-17/)) and `PSR-18` ([HTTP client](https://www.php-fig.org/psr/psr-18/)). You may choose any implementation of [PSR-17](https://packagist.org/providers/psr/http-factory-implementation) and [PSR-18](https://packagist.org/providers/php-http/client-implementation), for example, the following command installs `nyholm/psr7` for `PSR-17` and Guzzle HTTP client for `PSR-18`.

```
composer require nyholm/psr7 guzzlehttp/guzzle

```

### Manual Installation

If you are not using composer, download the latest release from the releases section. You should download the zip file. After that include autoload.php in your application and you can use the API as usual.

For further help, Please visit our [documentation](https://api.prokerala.com/docs)

## Usage

Please check out our [API Demo](https://api.prokerala.com/demo) for a sample implementation using the SDK. The source code for the demo is available under the GitHub repository [prokerala/astrology-api-demo](https://github.com/prokerala/astrology-api-demo).

## License

Copyright &copy; 2019-2020 [Ennexa Technologies Private Limited](https://www.ennexa.com). The Prokerala [Astrology](https://www.prokerala.com/astrology/) API PHP SDK is released under the [MIT License](https://github.com/prokerala/astrology-sdk/blob/master/LICENSE).

