<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Common\Api\Traits;

use Prokerala\Common\Api\Client;

/**
 * @internal
 */
trait ClientAwareTrait
{
    /** @var Client */
    protected $apiClient;

    /**
     * Set API Client.
     *
     * @param Client $client Api client
     */
    public function setApiClient(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Get API client.
     *
     * @return Client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }
}
