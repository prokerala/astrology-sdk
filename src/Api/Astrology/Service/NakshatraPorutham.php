<?php
namespace Prokerala\Api\Astrology\Service;

use Prokerala\Api\Astrology\AstroTrait;
use Prokerala\Api\Astrology\NakshatraProfile;
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
     * @param NakshatraProfile $girl_profile
     * @param NakshatraProfile $boy_profile
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     */
    public function process(NakshatraProfile $girl_profile, NakshatraProfile $boy_profile)
    {
        $classNameSpace = '\\Prokerala\\Api\\Astrology\\Result\\';

        $arParameter = [
            'girl_nakshatra' => $girl_profile->getNakshatra(),
            'girl_nakshatra_pada' => $girl_profile->getNakshatraPada(),
            'boy_nakshatra' => $boy_profile->getNakshatra(),
            'boy_nakshatra_pada' => $boy_profile->getNakshatraPada(),
        ];

        $apiResponse = $this->apiClient->doGet($this->slug, $arParameter);
        $this->apiResponse = $apiResponse;

        $this->result = $this->make(Porutham::class, $apiResponse);
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
