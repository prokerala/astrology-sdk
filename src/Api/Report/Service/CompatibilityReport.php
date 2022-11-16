<?php

declare(strict_types=1);

namespace Prokerala\Api\Report\Service;

use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class CompatibilityReport
{
    use ClientAwareTrait;

    protected string $slug = '/report/compatibility-reading/instant';

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Fetch result from API.
     *
     * @param array $input Chart type
     */
    public function process(array $input, array $options)
    {
        $parameters = [
            'input' => $input,
            'options' => $options,
        ];

        return $this->apiClient->process($this->slug, $parameters);
    }
}
