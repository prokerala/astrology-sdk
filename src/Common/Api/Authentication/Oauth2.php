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
use Prokerala\Common\Api\Exception\TokenExpiredException;
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
    public const TOKEN_ENDPOINT = 'https://api.prokerala.com/token';

    private ?string $accessToken = null;

    private string $clientId;

    private string $clientSecret;

    private ClientInterface $httpClient;

    private ?CacheInterface $cache;

    private RequestFactoryInterface $httpRequestFactory;

    private int $tokenExpiresAt = 0;

    private StreamFactoryInterface $streamFactory;

    public function __construct(
        string $clientId,
        string $clientSecret,
        ClientInterface $httpClient,
        RequestFactoryInterface $httpRequestFactory,
        StreamFactoryInterface $streamFactory,
        ?CacheInterface $cache = null
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->httpClient = $httpClient;
        $this->cache = $cache;

        // Try loading access token from cache
        if ($cache) {
            $this->cache = $cache;

            try {
                /** @var null|string $accessToken */
                $accessToken = $cache->get(self::CACHE_KEY);
                $this->accessToken = $accessToken;
            } catch (InvalidArgumentException) {
                // Ignore and continue
            }
        }
        $this->httpRequestFactory = $httpRequestFactory;
        $this->streamFactory = $streamFactory;
    }

    /**
     * @throws AuthenticationException
     */
    public function getToken(): string
    {
        if (!$this->accessToken || time() > $this->tokenExpiresAt) {
            $this->requestAccessToken();
        }

        \assert(\is_string($this->accessToken));

        return $this->accessToken;
    }

    public function handleError(\stdClass $response, int $code): void
    {
        $this->cache?->delete(self::CACHE_KEY);

        if (isset($response->errors[0]) && ('643' === $response->errors[0]->code)) {
            throw new TokenExpiredException($response->errors[0]->detail);
        }
    }

    /**
     * @throws AuthenticationException
     */
    private function requestAccessToken(): void
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
        $responseData = json_decode($response->getBody(), false);
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
