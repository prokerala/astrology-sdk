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
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

/**
 * Defines the HoroscopeMatch
 *
 * @property \stdClass result
 */
class NakshatraPorutham
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'nakshatra-porutham';
    protected $lang = 'en';

    protected $result;
    protected $input;

    /**
     * @param Client $client api client object
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->result = new \stdClass();
    }

    /**
     * Fetch result from API
     *
     * @param $bride_star
     * @param $groom_star
     * @param $system
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     * @return NakshatraPorutham
     */
    public function process($bride_star, $groom_star)
    {
        $arParameter = [
            'bride_star' => $bride_star,
            'bridegroom_star' => $groom_star,
            'lang' => $this->lang,
        ];
        $result = $this->apiClient->doGet($this->slug, $arParameter);

        $this->input = $result->request;

        foreach ($result->response as $res_key => $res_value) {
            $this->result->{$res_key} = new \stdClass();
            if (in_array($res_key, [1 => 'result', 'porutham_details', 'nakshatras_details'])) {
                foreach ($res_value as $res_key1 => $res_value1) {
                    $this->result->{$res_key}->{$res_key1} = $res_value1;
                }
            } else {
                $this->result->{$res_key} = $res_value;
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
     * Function returns porutham details
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
