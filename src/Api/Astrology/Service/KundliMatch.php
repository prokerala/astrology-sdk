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
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Common\Api\Client;

/**
 * Defines the KundliMatch.
 */
class KundliMatch
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'kundli-matching';
    protected $ayanamsa = 1;

    protected $result;
    protected $input;

    /**
     * @param object $client api client object
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->result = new \stdClass();
    }

    /**
     * Fetch result from API.
     *
     * @param object $location location details
     * @param object $datetime date and time
     *
     * @return array
     */
    public function process(Profile $brideProfile, Profile $groomProfile)
    {
        $classNameSpace = '\\Prokerala\\Api\\Astrology\\Result\\';

        $brideLocation = $brideProfile->getLocation();
        $groomLocation = $groomProfile->getLocation();

        $arParameter = [
            'bride_dob' => $brideProfile->getDateTime()->format('c'),
            'bride_coordinates' => $brideLocation->getCoordinates(),
            'bridegroom_dob' => $groomProfile->getDateTime()->format('c'),
            'bridegroom_coordinates' => $groomLocation->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];
        $result = $this->apiClient->process($this->slug, $arParameter);

        $this->input = $result->request;
        foreach (['bride_details', 'bridegroom_details'] as $res_key) {
            $res_value = $result->response->{$res_key};
            $tz = 'bride_details' === $res_key ? $brideLocation->getTimeZone() : $groomLocation->getTimeZone();
            foreach ($res_value as $res_key1 => $res_value1) {
                $class = $this->getClassName($res_key1, true);
                if ($class) {
                    if ('planet_positions' === $res_key1) {
                        foreach ($res_value1 as $planet_positions) {
                            $planet = $this->make($class, $planet_positions, $tz);
                            $this->result->{$res_key}->{$res_key1}[$planet->getId()] = $planet;
                        }
                    } else {
                        $this->result->{$res_key}->{$res_key1} = $this->make($class, $res_value1, $tz);
                    }
                } else {
                    $this->result->{$res_key}->{$res_key1} = $res_value1;
                }
            }
        }
        $this->result->result = $result->response->result;

        return $this;
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
     * Set ayanamsa system.
     *
     * @param object $client   client class object
     * @param int    $ayanamsa
     */
    public function setAyanamsa($ayanamsa)
    {
        $this->ayanamsa = $ayanamsa;
    }

    /**
     * Function returns vasara details.
     *
     * @return object
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Get API input.
     *
     * @return object
     */
    public function getInput()
    {
        return $this->input;
    }
}
