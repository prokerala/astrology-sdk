<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Common\Api\Authentication;

use Prokerala\Common\Api\Exception\AuthenticationException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\InvalidArgumentException;

class Oauth2 implements AuthenticationTypeInterface
{
    use BasicAuthTrait;

    const CACHE_KEY = 'prokerala_api_client.oauth_access_token';
    const TOKEN_ENDPOINT = 'https://api.prokerala.com/token';

    /** @var string */
    private $accessToken;
    /** @var string */
    private $clientId;
    /** @var string */
    private $clientSecret;
    /** @var ClientInterface */
    private $httpClient;
    /** @var null|CacheInterface */
    private $cache;
    /** @var RequestFactoryInterface */
    private $httpRequestFactory;
    /** @var int */
    private $tokenExpiresAt = 0;
    /** @var StreamFactoryInterface */
    private $streamFactory;

    /**
     * @param string              $clientId
     * @param string              $clientSecret
     * @param null|CacheInterface $cache
     */
    public function __construct($clientId, $clientSecret, ClientInterface $httpClient, RequestFactoryInterface $httpRequestFactory, StreamFactoryInterface $streamFactory, $cache = null)
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
        $this->streamFactory = $streamFactory;
    }

    /**
     * @throws AuthenticationException
     *
     * @return string
     */
    public function getToken()
    {
        if (!$this->accessToken || time() > $this->tokenExpiresAt) {
            $this->requestAccessToken();
        }

        return $this->accessToken;
    }

    /**
     * @param string $message
     * @param int    $code
     */
    public function handleError($message, $code)
    {
        // TODO: Implement handleError() method.
        if ($this->cache) {
            $this->cache->delete(self::CACHE_KEY);
        }
    }

    /**
     * @throws AuthenticationException
     */
    private function requestAccessToken()
    {
        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ];
        $url = self::TOKEN_ENDPOINT;

        $stream = $this->streamFactory->createStream(http_build_query($data));
        $request = $this->httpRequestFactory->createRequest('POST', $url)
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->withBody($stream)
        ;

        try {
            $response = $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            throw new AuthenticationException("Failed to fetch access token. Request failed with error - {$e->getMessage()}", 0, $e);
        }

        $responseData = json_decode($response->getBody(), false, 512);
        if (!$responseData) {
            throw new AuthenticationException('Failed to parse token');
        }

        if (200 !== $response->getStatusCode()) {
            // TODO: handle other errors
            throw new AuthenticationException($responseData->errors[0]->detail);
        }

        if ($this->cache) {
            try {
                $this->cache->set(self::CACHE_KEY, $this->accessToken);
            } catch (InvalidArgumentException $e) {
                throw new AuthenticationException('Failed to cache access token', 0, $e);
            }
        }

        $this->accessToken = $responseData->access_token;
        $this->tokenExpiresAt = time() + $responseData->expires_in;
    }
}
