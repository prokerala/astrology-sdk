<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Nyholm\Psr7\Factory\Psr17Factory;
use GuzzleHttp\Client as HttpClient;
use Prokerala\Common\Api\Authentication\Oauth2;
use Prokerala\Common\Api\Client;
use Http\Message\StreamFactory;
include __DIR__.'/vendor/autoload.php';

const API_KEY = '9e7f22e1be6c801186583cb4a042d5a8a69ffcd874de10b7482abe89fb399b47';

$apiKey = API_KEY === 'YOUR_API_KEY_HERE' ? getenv('API_KEY') : API_KEY;

$psr17Factory = new Psr17Factory();
$httpClient = new HttpClient();

$clientId = "016f64f8-8b79-44c4-aac5-7666bdf6b809";
$clientSecret = "GFXC2KftBpAc0XwF7VHA2l56InfliZLJPGxoJat0";

$authClient = new Oauth2($clientId, $clientSecret, $httpClient, $psr17Factory, $psr17Factory);

$client = new Client($authClient, $httpClient, $psr17Factory);
