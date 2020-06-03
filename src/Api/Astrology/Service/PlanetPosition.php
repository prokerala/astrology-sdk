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
 * @see     https://github.com/prokerala/astrology-sdk
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

    protected $input;
    protected $planet_positions;

    protected $apiClient;
    protected $slug = 'planet-position';
    protected $ayanamsa = 1;

    /**
     * @param object $client api client object
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Fetch result from API
     *
     * @param  object $location location details
     * @param  object $datetime date and time
     * @return array
     */
    public function process(Location $location, \DateTimeInterface $datetime)
    {
        $arParameter = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];

        $result = $this->apiClient->doGet($this->slug, $arParameter);
        $tz = $location->getTimeZone();

        $this->input = $result->request;
        $planet_position = [];
        foreach ($result->response->planet_positions as $planetPosition) {
            $planet = $this->make(Planet::class, $planetPosition, $tz);
            $planet_position[$planet->getId()] = $planet;
        }

        $this->planet_positions = $planet_position;
        $this->chart_positions = $result->response->chart_positions;
        $this->first_house = $result->response->first_house;

        return $this;
    }

    /**
     * Set Api Client
     *
     * @param object $client client class object
     */
    public function setApiClient(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Set ayanamsa system
     *
     * @param object $client   client class object
     * @param int  $ayanamsa
     */
    public function setAyanamsa($ayanamsa)
    {
        $this->ayanamsa = $ayanamsa;
    }

    /**
     * Get planet positions
     *
     * @return object
     */
    public function getPlanets()
    {
        return $this->planet_positions;
    }

    /**
     * Get API input
     *
     * @return object
     */
    public function getInput()
    {
        return $this->input;
    }
}
