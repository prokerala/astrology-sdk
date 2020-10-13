<?php
/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Service;

use DateTimeInterface;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Horoscope\AdvancedSadeSati as AdvancedSadeSatiResult;
use Prokerala\Api\Astrology\Result\Horoscope\SadeSati as SadeSatiResult;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Service\AyanamsaAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Traits\Api\ClientAwareTrait;


class SadeSati
{
    use AyanamsaAwareTrait;
    use ClientAwareTrait;

    protected $slug = 'sade-sati';

    /** @var Transformer<SadeSatiResult> */
    private $basicResponseTransformer;

    /** @var Transformer<AdvancedSadeSatiResult> */
    private $advancedResponseTransformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->basicResponseTransformer = new Transformer(SadeSatiResult::class);
        $this->advancedResponseTransformer = new Transformer(AdvancedSadeSatiResult::class);
    }

    /**
     * Fetch result from API.
     *
     * @param Location $location
     * @param DateTimeInterface $datetime
     * @param bool $detailed_report
     *
     * @return ResultInterface
     */
    public function process(Location $location, DateTimeInterface $datetime, $detailed_report = false)
    {
        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }

        $parameters = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->getAyanamsa(),
        ];

        $apiResponse = $this->apiClient->process($slug, $parameters);
        if ($detailed_report) {
            return $this->advancedResponseTransformer->transform($apiResponse->data);
        }

        return $this->basicResponseTransformer->transform($apiResponse->data);
    }
}
