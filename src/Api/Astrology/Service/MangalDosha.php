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
use Prokerala\Common\Api\Client;

/**
 * Defines the MangalDosha
 */
class MangalDosha
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'manglik';
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
     * Fetch result from API
     *
     * @param  object $location location details
     * @param  object $datetime date and time
     * @return array
     */
    public function process(Location $location, $datetime)
    {
        $arParameter = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];
        $result = $this->apiClient->doGet($this->slug, $arParameter);
        $this->input = $result->request;
        foreach ($result->response->result as $res_key => $res_value) {
            $class = $this->getClassName($res_key, true);
            if ($class) {
                foreach ($res_value as $res_value1) {
                    if ('planet_positions' == $res_value) {
                        $planet = new $class($res_value1);
                        $this->result->result->{$res_key}[$planet->getId()] = $planet;
                    } else {
                        $this->result->result->{$res_key}[] = new $class($res_value1);
                    }
                }
            } else {
                $this->result->result->{$res_key} = $res_value;
            }
        }

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
     * Function returns vasara details
     *
     * @return object
     */
    public function getResult()
    {
        return $this->result;
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
