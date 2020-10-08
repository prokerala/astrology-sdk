<?php
namespace Prokerala\Api\Astrology\Service;

use Prokerala\Api\Astrology\AstroTrait;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\PapaSamyamCheck as PapaSamyamResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use stdClass;

class PapaSamyamCheck
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'papasamyam-check';
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
     * @param Profile $girl_profile
     * @param Profile $boy_profile
     * @param bool $detailed_report
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     */
    public function process(Profile $girl_profile, Profile $boy_profile, $detailed_report = false)
    {
        $girl_location = $girl_profile->getLocation();
        $boy_location = $boy_profile->getLocation();

        $arParameter = [
            'girl_coordinates' => $girl_location->getCoordinates(),
            'girl_dob' => $girl_profile->getDateTime()->format('c'),
            'boy_coordinates' => $boy_location->getCoordinates(),
            'boy_dob' => $boy_profile->getDateTime()->format('c'),
            'ayanamsa' => $this->ayanamsa,
        ];
        $apiResponse = $this->apiClient->doGet($this->slug, $arParameter);
        $this->apiResponse = $apiResponse->data;
        $this->result = $this->make(PapaSamyamResult::class, $apiResponse->data);
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
     * Function returns Papa Samyam details
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
     * @return stdClass
     */
    public function getRawResponse()
    {
        return $this->apiResponse;
    }

    /**
     * Get the input as parsed by the API server
     *
     * @return stdClass
     */
    public function getParsedInput()
    {
        return $this->input;
    }
}
