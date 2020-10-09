<?php

/**
 * (c) Ennexa <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Ennexa <api@prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology-sdk
 */

namespace Prokerala\Common\Api;

use Prokerala\Common\Api\Exception\InvalidArgumentException;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

/**
 * Client
 *
 * PHP version 5
 */
class Client
{
    const BASE_URI = "https://api.prokerala.loc:8443/";

    private $authClient;
    private $httpClient;
    private $httpRequestFactory;

    /**
     * Client constructor.
     * @param $authClient
     * @param $httpClient
     * @param $httpRequestFactory
     */
    public function __construct($authClient, $httpClient, $httpRequestFactory)
    {
        $this->authClient = $authClient;
        $this->httpClient = $httpClient;
        $this->httpRequestFactory = $httpRequestFactory;
    }

    /**
     * Function used to get response from API (GET Method)
     * @internal
     * @param  string $path   section path
     * @param  array  $input request parameters
     * @return array
     */
    public function process($path, $input)
    {
        $uri = self::BASE_URI . $path . '?' . http_build_query($input);
        $request = $this->httpRequestFactory->createRequest('GET', $uri);
        try {
            $request = $this->authClient->process($request);
            $response = $this->request($request);
            if ($response->getStatusCode() === 401) {
                $this->authClient->handleError($response->message, $response->code);
            }
        } catch (Exception\RetryableExceptionInterface $e) {
            $request = $this->authClient->process($request);
            $response = $this->request($request);
        }



        // Throw exception
        switch ($response->getStatus()) {
            case 200:
                return json_decode($response->getBody(), true);
            case 401:
                throw AuthException; // On authentication error
                break;
            case 400:
                throw InvalidArgumentException; // On authentication error
                break;
            case 500:
                throw ServerException; // On internal server error
                break;
            default:
                throw Exception;
        }
    }

    private function request(RequestInterface $request)
    {
        return $this->httpClient->sendRequest($request);
    }
}
