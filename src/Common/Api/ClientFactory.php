<?php
declare(strict_types=1);

namespace Prokerala\Common\Api;

use Nyholm\Psr7\Factory\Psr17Factory;
use GuzzleHttp\Client as HttpClient;

class ClientFactory
{
    /**
     * @param string $clientId
     * @param string $clientSecret
     * @return Client
     */
    public function create($clientId, $clientSecret)
	{
		$psr17Factory = new Psr17Factory();
		$httpClient = new HttpClient();

		$authClient = new OauthClient($clientId, $clientSecret, $httpClient, $psr17Factory);

		return new Client($authClient, $httpClient, $psr17Factory);
	}

}
