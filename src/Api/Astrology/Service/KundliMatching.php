<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Service;

use Prokerala\Api\Astrology\AstroTrait;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaKoot;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaMilan;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\Message;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\KundliMatching as KundliMatchingResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\ProfileInfo;
use Prokerala\Common\Api\Client;

class KundliMatching
{

    use AstroTrait;

    protected $apiClient;
    protected $slug = 'kundli-matching';
    protected $ayanamsa = 1;

    protected $result;
    protected $input;
    /**
     * @var \stdClass
     */
    protected $apiResponse;

    protected $arClassNameMap = [
        'boy_info' => ProfileInfo::class,
        'girl_info' => ProfileInfo::class,
        'gunamilan' => [
            GunaMilan::class, [
                'varna_koot' => GunaKoot::class,
                'vasya_koot' => GunaKoot::class,
                'tara_koot' => GunaKoot::class,
                'yoni_koot' => GunaKoot::class,
                'graha_maitri_koot' => GunaKoot::class,
                'bhakoot_koot' => GunaKoot::class,
                'nadi_koot' => GunaKoot::class,
                'gana_koot' => GunaKoot::class,
            ],
        ],
        'message' => Message::class,
    ];

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
    public function process(Profile $girl_profile, Profile $boy_profile)
    {
        $classNameSpace = '\\Prokerala\\Api\\Astrology\\Result\\';

        $girl_location = $girl_profile->getLocation();
        $boy_location = $boy_profile->getLocation();

        $parameters = [
            'bride_dob' => $girl_profile->getDateTime()->format('c'),
            'bride_coordinates' => $girl_location->getCoordinates(),
            'bridegroom_dob' => $boy_profile->getDateTime()->format('c'),
            'bridegroom_coordinates' => $boy_location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];

        $apiResponse = $this->apiClient->doGet($this->slug, $parameters);
        $this->apiResponse = $apiResponse;

        $this->result = $this->make(KundliMatchingResult::class, $apiResponse);

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
     * Get raw response returned by the API
     *
     * @return \stdClass
     */
    public function getRawResponse()
    {
        return $this->apiResponse;
    }

    /**
     * Get the input as parsed by the API server
     *
     * @return \stdClass
     */
    public function getParsedInput()
    {
        return $this->input;
    }
}
