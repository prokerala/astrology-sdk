<?php
namespace Prokerala\Tests\Api\Astrology\Traits;

use Nyholm\Psr7\Factory\Psr17Factory;
use GuzzleHttp\Client as HttpClient;
use Prokerala\Common\Api\Authentication\Oauth2;
use Prokerala\Common\Api\Client;

trait AuthenticationTrait
{
    public function setClient() {
        $clientId = 'client_id';
        $clientSecret = 'client_secret';

        $psr17Factory = new Psr17Factory();
        $httpClient = new HttpClient(['verify' => false]);

        $authClient = new Oauth2($clientId, $clientSecret, $httpClient, $psr17Factory, $psr17Factory);
        return new Client($authClient, $httpClient, $psr17Factory);
    }
}
