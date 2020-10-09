<?php


namespace Prokerala\Common\Api\Authentication;

use Prokerala\Common\Api\Exception\AuthenticationException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\SimpleCache\CacheInterface;

/**
 * Token
 *
 * PHP version 5
 */
class Oauth2 extends BasicAuth implements AuthenticationInterface
{
    const CACHE_KEY = 'prokerala_api_client.oauth_access_token';
    private $accessToken = null;
    private $clientId;
    private $clientSecret;
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var CacheInterface|null
     */
    private $cache;
    /**
     * @var RequestFactoryInterface
     */
    private $httpRequestFactory;
    /**
     * @var int|mixed
     */
    private $tokenExpiresAt;

    /**
     * OauthClient constructor.
     * @param $clientId
     * @param $clientSecret
     * @param $httpClient
     * @param RequestFactoryInterface $httpRequestFactory
     * @param null $cache
     */
    public function __construct($clientId, $clientSecret, $httpClient, $httpRequestFactory, $cache = null)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->httpClient = $httpClient;
        $this->cache = $cache;

        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->httpClient = $httpClient;

        // Try loading access token from cache
        if ($cache) {
            $this->cache = $cache;
            $this->accessToken = $cache->get(self::CACHE_KEY);
        }
        $this->httpRequestFactory = $httpRequestFactory;
    }

    public function getToken()
    {
        if (!$this->accessToken || time() > $this->tokenExpiresAt) {
            $this->generateAccessToken();
        }

        return $this->accessToken;
    }

    private function generateAccessToken()
    {
        // Generate access token
        if ($this->cache) {
            $this->cache->set(self::CACHE_KEY, $this->accessToken);
        }

        $request = $this->httpRequestFactory->createRequest('Post',
            'https://api.prokerala.loc:8443/token?'.http_build_query([
                'grant_type' => 'client_credentials',
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
            ])
        );
        $request = $request->withHeader('Accept', 'application/json');
        $response = $this->httpClient->sendRequest($request);
        $responseData = json_decode($response->getBody());
        if ($response->getStatusCode() !== 200) {
            // TODO: handle other errors
            throw new AuthenticationException($responseData->errors[0]['detail']);
        }
        $this->accessToken = $responseData['access_token'];
        $this->tokenExpiresAt = time() + $responseData['expires_in'];
    }

    public function handleError($message, $code)
    {
        // TODO: Implement handleError() method.
    }
}





