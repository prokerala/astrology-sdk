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
    protected Client $apiClient;

    /**
     * Set API Client.
     *
     * @param Client $client Api client
     */
    public function setApiClient(Client $client): void
    {
        $this->apiClient = $client;
    }

    /**
     * Get API client.
     */
    public function getApiClient(): Client
    {
        return $this->apiClient;
    }
}
