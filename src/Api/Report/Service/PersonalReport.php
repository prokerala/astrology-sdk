<?php

declare(strict_types=1);

namespace Prokerala\Api\Report\Service;

use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class PersonalReport
{
    use ClientAwareTrait;

    protected string $slug = '/report/personal-reading/instant';

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
     * @param array<string,mixed> $input
     * @param array<string,mixed> $options
     */
    public function process(array $input, array $options): string
    {
        $parameters = [
            'input' => $input,
            'options' => $options,
        ];

        /** @var string */
        return $this->apiClient->process($this->slug, $parameters);
    }
}
