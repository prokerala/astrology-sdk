<?php
declare(strict_types=1);

namespace Prokerala\Api\Report\Service;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Traits\Service\TimeZoneAwareTrait;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class CompatibilityReport
{

    use ClientAwareTrait;
    use TimeZoneAwareTrait;

    /** @var string */
    protected $slug = '/report/compatibility-reading/instant';

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
     * @param array             $input  Chart type
     * @param array             $options
     *
     */
    public function process($input, $options)
    {
        $parameters = [
            'input' => $input,
            'options' => $options,
        ];

        return $this->apiClient->process($this->slug, $parameters);
    }
}
