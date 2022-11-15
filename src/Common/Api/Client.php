<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Common\Api;

use Prokerala\Common\Api\Authentication\AuthenticationTypeInterface;
use Prokerala\Common\Api\Exception\AuthenticationException;
use Prokerala\Common\Api\Exception\Exception;
use Prokerala\Common\Api\Exception\RetryableExceptionInterface;
use Prokerala\Common\Api\Exception\ServerException;
use Prokerala\Common\Api\Exception\ValidationException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class Client
{
    public const BASE_URI = 'https://api.prokerala.com/v2';

    /**
     * @var AuthenticationTypeInterface
     */
    private $authClient;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var RequestFactoryInterface
     */
    private $httpRequestFactory;

    /**
     * @var int
     */
    private $apiCreditUsed = 0;

    public function __construct(AuthenticationTypeInterface $authClient, ClientInterface $httpClient, RequestFactoryInterface $httpRequestFactory)
    {
        $this->authClient = $authClient;
        $this->httpClient = $httpClient;
        $this->httpRequestFactory = $httpRequestFactory;
    }

    /**
     * Query the API server.
     *
     * @internal
     *
     * @param string $path  section path
     * @param array  $input request parameters
     *
     * @return \stdClass|string
     */
    public function process($path, $input)
    {
        $uri = self::BASE_URI . $path . '?' . http_build_query($input);
        $request = $this->httpRequestFactory->createRequest('GET', $uri);

        try {
            $request = $this->authClient->process($request);
            $response = $this->request($request);
            if (401 === $response->getStatusCode()) {
                $this->authClient->handleError($response->getBody(), $response->getStatusCode());
            }
        } catch (RetryableExceptionInterface) {
            $request = $this->authClient->process($request);
            $response = $this->request($request);
        }

        $apiCredits = $response->getHeader('X-Api-Credits')[0] ?? null;
        $this->apiCreditUsed = isset($apiCredits) ? (int)$apiCredits : 0;

        $responseData = $this->parseResponse($response);

        $statusCode = $response->getStatusCode();
        assert(200 === $statusCode || is_object($responseData));

        if (200 === $statusCode) {
            return $responseData;
        }

        assert($responseData instanceof \stdClass);
        $this->handleError($statusCode, $responseData->errors);

    }

    /**
     * @return int
     */
    public function getCreditUsed()
    {
        return $this->apiCreditUsed;
    }

    /**
     * @return ResponseInterface
     */
    private function request(RequestInterface $request)
    {
        return $this->httpClient->sendRequest($request);
    }

    /**
     * @return \stdClass|string
     */
    private function parseResponse(ResponseInterface $response)
    {
        $responseType = $response->getHeader('content-type');
        $responseBody = (string)$response->getBody();

        if (!isset($responseType[0]) || 'application/json' !== $responseType[0]) {
            return $responseBody;
        }

        /** @var \stdClass */
        return json_decode($responseBody, null, 512, \JSON_THROW_ON_ERROR);
    }

    /**
     * @param list<\stdClass> $errors
     * @return never
     */
    private function handleError(int $statusCode, array $errors)
    {
        throw match ($statusCode) {
            401 => throw new AuthenticationException($errors[0]->detail),
            400 => throw new ValidationException($errors),
            500 => throw new ServerException($errors[0]->detail),
            default => throw new Exception($errors[0]->detail),
        };
    }
}
