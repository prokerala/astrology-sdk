<?php
/**
 * (c) Ennexa <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Ennexa <api@prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology
 */

namespace Prokerala\Api\Astrology\Service;

use Prokerala\Api\Astrology\AstroTrait;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Planet;
use Prokerala\Common\Api\Client;

/**
 * Defines the Panchang
 */
class PlanetPosition
{
    use AstroTrait;

    public $input;
    public $planet_positions;

    protected $apiClient;
    protected $slug = 'planet-position';
    protected $ayanamsa = 1;

    /**
     * Function returns panchang details
     *
     * @param object $client api client object
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Function returns panchang details
     *
     * @param  object $location location details
     * @param  object $datetime date and time
     * @return array
     */
    public function process(Location $location, \DateTimeInterface $datetime)
    {
        $arParameter = [
            'datetime' => $datetime->format('Y-m-d\\TH:i:s\\Z'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];

        $result = $this->apiClient->doGet($this->slug, $arParameter);

        $this->input = $result->request;
        $planet_position = [];
        foreach ($result->response->planet_positions as $planetPosition) {
            $planet = new Planet($planetPosition);
            $planet_position[$planet->getId()] = $planet;
        }

        $this->planet_positions = $planet_position;
        $this->chart_positions = $result->response->chart_positions;
        $this->first_house = $result->response->first_house;

        return $this;
    }

    /**
     * Function returns panchang details
     *
     * @param object $client client class object
     */
    public function setApiClient(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Function returns panchang details
     *
     * @param object $client   client class object
     * @param mixed  $ayanamsa
     */
    public function setAyanamsa($ayanamsa)
    {
        $this->ayanamsa = $ayanamsa;
    }

    /**
     * Function returns input details
     *
     * @return object
     */
    public function getPlanets()
    {
        return $this->planet_positions;
    }

    /**
     * Function returns input details
     *
     * @return object
     */
    public function getInput()
    {
        return $this->input;
    }
}
