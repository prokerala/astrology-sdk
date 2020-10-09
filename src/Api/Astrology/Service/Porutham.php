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

use Prokerala\Api\Astrology\AstroTrait;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\AdvancedPorutham as AdvancedMatchResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham as MatchResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use stdClass;

class Porutham
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'porutham';
    protected $ayanamsa = 1;

    protected $result;
    protected $input;
    /**
     * @var stdClass
     */
    protected $apiResponse;

    /**
     * @param Client $client api client object
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->result = new stdClass();
    }

    /**
     * @param string $system
     * @param bool   $detailed_report
     *
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     */
    public function process(Profile $girl_profile, Profile $boy_profile, $system, $detailed_report = false)
    {
        $classNameSpace = '\\Prokerala\\Api\\Astrology\\Result\\';

        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }

        $girl_location = $girl_profile->getLocation();
        $boy_location = $boy_profile->getLocation();

        $arParameter = [
            'girl_coordinates' => $girl_location->getCoordinates(),
            'girl_dob' => $girl_profile->getDateTime()->format('c'),
            'boy_coordinates' => $boy_location->getCoordinates(),
            'boy_dob' => $boy_profile->getDateTime()->format('c'),
            'system' => $system,
            'ayanamsa' => $this->ayanamsa,
        ];
        $apiResponse = $this->apiClient->process($slug, $arParameter);
        $this->apiResponse = $apiResponse->data;
        if ($detailed_report) {
            $this->result = $this->make(AdvancedMatchResult::class, $apiResponse->data);
        } else {
            $this->result = $this->make(MatchResult::class, $apiResponse->data);
        }
    }

    /**
     * Set Api Client.
     *
     * @param object $client client class object
     */
    public function setApiClient(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Function returns porutham details.
     *
     * @return object
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Get raw response returned by the API.
     *
     * @return stdClass
     */
    public function getRawResponse()
    {
        return $this->apiResponse;
    }

    /**
     * Get the input as parsed by the API server.
     *
     * @return stdClass
     */
    public function getParsedInput()
    {
        return $this->input;
    }
}
