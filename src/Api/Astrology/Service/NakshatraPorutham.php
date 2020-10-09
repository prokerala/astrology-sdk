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
use Prokerala\Api\Astrology\NakshatraProfile;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\AdvancedNakshatraPorutham as AdvancedPorutham;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham as Porutham;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use stdClass;

class NakshatraPorutham
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'nakshatra-porutham';

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
     * @param bool $detailed_report
     *
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     */
    public function process(NakshatraProfile $girl_profile, NakshatraProfile $boy_profile, $detailed_report = false)
    {
        $classNameSpace = '\\Prokerala\\Api\\Astrology\\Result\\';
        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }
        $arParameter = [
            'girl_nakshatra' => $girl_profile->getNakshatra(),
            'girl_nakshatra_pada' => $girl_profile->getNakshatraPada(),
            'boy_nakshatra' => $boy_profile->getNakshatra(),
            'boy_nakshatra_pada' => $boy_profile->getNakshatraPada(),
        ];

        $apiResponse = $this->apiClient->doGet($slug, $arParameter);
        $this->apiResponse = $apiResponse;

        if ($detailed_report) {
            $this->result = $this->make(AdvancedPorutham::class, $apiResponse->data);
        } else {
            $this->result = $this->make(Porutham::class, $apiResponse->data);
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
