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

use Prokerala\Api\Astrology\NakshatraProfile;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\AdvancedThirumanaPorutham as AdvancedPorutham;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham as Porutham;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class ThirumanaPorutham
{
    use ClientAwareTrait;

    protected $slug = '/astrology/thirumana-porutham';

    /** @var Transformer<Porutham> */
    private $basicResponseTransformer;

    /** @var Transformer<AdvancedPorutham> */
    private $advancedResponseTransformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->basicResponseTransformer = new Transformer(Porutham::class);
        $this->advancedResponseTransformer = new Transformer(AdvancedPorutham::class);
    }

    /**
     * @param bool $detailed_report
     *
     * @return AdvancedPorutham|Porutham
     */
    public function process(NakshatraProfile $girl_profile, NakshatraProfile $boy_profile, $detailed_report = false, string $la = 'en'): AdvancedPorutham|\Prokerala\Api\Astrology\Service\Porutham
    {
        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }
        $parameters = [
            'girl_nakshatra' => $girl_profile->getNakshatra(),
            'girl_nakshatra_pada' => $girl_profile->getNakshatraPada(),
            'boy_nakshatra' => $boy_profile->getNakshatra(),
            'boy_nakshatra_pada' => $boy_profile->getNakshatraPada(),
            'la' => $la,
        ];

        $apiResponse = $this->apiClient->process($slug, $parameters);

        if ($detailed_report) {
            return $this->advancedResponseTransformer->transform($apiResponse->data);
        }

        return $this->basicResponseTransformer->transform($apiResponse->data);
    }
}
