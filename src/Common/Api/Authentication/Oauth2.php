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

    public const CACHE_KEY = 'prokerala_api_client.oauth_access_token';
    public const TOKEN_ENDPOINT = 'https://api.prokerala.loc/token';

    /** @var string */
    private $accessToken;

    /** @var int */
    private $tokenExpiresAt = 0;

    /**
     * @param string              $clientId
     * @param string              $clientSecret
     */
    public function __construct(private $clientId, private $clientSecret, private ClientInterface $httpClient, private RequestFactoryInterface $httpRequestFactory, private StreamFactoryInterface $streamFactory, private ?\Psr\SimpleCache\CacheInterface $cache = null)
    {
        // Try loading access token from cache
        if ($cache) {
            $this->cache = $cache;
            $accessToken = $cache->get(self::CACHE_KEY);
            \assert(\is_string($accessToken));
            $this->accessToken = $accessToken;
        }
    }

    /**
     * @return string
     * @throws AuthenticationException
     */
    public function getToken()
    {
        if (!$this->accessToken || time() > $this->tokenExpiresAt) {
            $this->requestAccessToken();
        }

        return $this->accessToken;
    }

    /**
     * @param  string $message
     * @param  int    $code
     * @return void
     */
    public function handleError($message, $code)
    {
        // TODO: Implement handleError() method.
        if ($this->cache) {
            $this->cache->delete(self::CACHE_KEY);
        }
    }

    /**
     * @return void
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

        /** @var null|\stdClass $responseData */
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
