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

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Horoscope\AdvancedMangalDosha as AdvancedMangalDoshaResult;
use Prokerala\Api\Astrology\Result\Horoscope\MangalDosha as MangalDoshaResult;
use Prokerala\Api\Astrology\Traits\Service\AyanamsaAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class MangalDosha
{
    use AyanamsaAwareTrait;
    use ClientAwareTrait;

    protected string $slug = '/astrology/mangal-dosha';

    /** @var Transformer<MangalDoshaResult> */
    private \Prokerala\Api\Astrology\Transformer $basicResponseTransformers;

    /** @var Transformer<AdvancedMangalDoshaResult> */
    private \Prokerala\Api\Astrology\Transformer $advancedResponseTransformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->basicResponseTransformers = new Transformer(MangalDoshaResult::class);
        $this->advancedResponseTransformer = new Transformer(AdvancedMangalDoshaResult::class);
    }

    /**
     * Fetch result from API.
     *
     * @param Location           $location        Location details
     * @param \DateTimeInterface $datetime        Date and time
     * @param bool               $detailed_report Return detailed result
     *
     * @return AdvancedMangalDoshaResult|MangalDoshaResult
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     */
    public function process(Location $location, \DateTimeInterface $datetime, bool $detailed_report = false, string $la = 'en')
    {
        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }

        $parameters = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->getAyanamsa(),
            'la' => $la,
        ];

        $apiResponse = $this->apiClient->process($slug, $parameters);
        assert($apiResponse instanceof \stdClass);
        if ($detailed_report) {
            return $this->advancedResponseTransformer->transform($apiResponse->data);
        }

        return $this->basicResponseTransformers->transform($apiResponse->data);
    }
}
