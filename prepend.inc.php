<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use GuzzleHttp\Client as HttpClient;
use Nyholm\Psr7\Factory\Psr17Factory;
use Prokerala\Common\Api\Authentication\Oauth2;
use Prokerala\Common\Api\Client;

include __DIR__ . '/vendor/autoload.php';

const CLIENT_ID = 'YOUR_CLIENT_ID';
const CLIENT_SECRET = 'YOUR_CLIENT_SECRET';

$clientId = (CLIENT_ID === 'YOUR_CLIENT_ID') ? getenv('CLIENT_ID') : CLIENT_ID;
$clientSecret = (CLIENT_SECRET === 'YOUR_CLIENT_SECRET') ? getenv('CLIENT_SECRET') : CLIENT_SECRET;

$psr17Factory = new Psr17Factory();
$httpClient = new HttpClient();

$authClient = new Oauth2($clientId, $clientSecret, $httpClient, $psr17Factory, $psr17Factory);

$client = new Client($authClient, $httpClient, $psr17Factory);
