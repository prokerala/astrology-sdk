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

use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\AdvancedKundliMatching as AdvancedMatchResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\KundliMatching as MatchResult;
use Prokerala\Api\Astrology\Traits\Service\AyanamsaAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class KundliMatching
{
    use AyanamsaAwareTrait;
    use ClientAwareTrait;

    protected string $slug = '/astrology/kundli-matching';

    /** @var Transformer<MatchResult> */
    private Transformer $basicResponseTransformer;

    /** @var Transformer<AdvancedMatchResult> */
    private Transformer $advancedResponseTransformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->basicResponseTransformer = new Transformer(MatchResult::class);
        $this->advancedResponseTransformer = new Transformer(AdvancedMatchResult::class);
    }

    /**
     * Fetch result from API.
     *
     * @return AdvancedMatchResult|MatchResult
     */
    public function process(Profile $girl_profile, Profile $boy_profile, bool $detailed_report = false, string $la = 'en')
    {
        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }

        $girl_location = $girl_profile->getLocation();
        $boy_location = $boy_profile->getLocation();

        $parameters = [
            'girl_coordinates' => $girl_location->getCoordinates(),
            'girl_dob' => $girl_profile->getDateTime()->format('c'),
            'boy_coordinates' => $boy_location->getCoordinates(),
            'boy_dob' => $boy_profile->getDateTime()->format('c'),
            'ayanamsa' => $this->getAyanamsa(),
            'la' => $la,
        ];

        $apiResponse = $this->apiClient->process($slug, $parameters);
        assert($apiResponse instanceof \stdClass);

        if ($detailed_report) {
            return $this->advancedResponseTransformer->transform($apiResponse->data);
        }

        return $this->basicResponseTransformer->transform($apiResponse->data);
    }
}
