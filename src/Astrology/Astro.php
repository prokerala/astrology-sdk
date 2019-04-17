<?php 

/**
 * (c) Ennexa Technologies <api@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 **/

namespace Prokerala\Astrology;
use Prokerala\Astrology\Http;
use Prokerala\Astrology\Validation;

const BASE_URI = 'http://api.prokerla.loc:8000/v1/astrology/';

class Astro
{

    private $access_token;
    private $request;
    
    public function __construct($access_token) {
        $this->access_token = $access_token;
        $this->request = new Http();
        $this->request->setAccessToken($this->access_token);
        $this->request->setBaseUri(BASE_URI);
    }

    Prokerala\Common\Exception
    Prokerala\Common\ExceptionInterface
    Prokerala\Common\Api\Client
    Prokerala\Common\Api\Exception\RateLimitExceededException
    Prokerala\Common\Api\Exception\QuotaExceededException

    Prokerala\Api\Astrology\Nakshatra
    Prokerala\Api\Astrology\Tithi
    Prokerala\Api\Astrology\Karana
    Prokerala\Api\Astrology\Yoga
    Prokerala\Api\Astrology\Vaasara
    Prokerala\Api\Astrology\Planet

    Prokerala\Api\Astrology\HoroscopeMatch\Result

    class Nakshatra {
        public const ASWINI = 0;
        public const BHARANI = 1;

        private static $nakshatras = ['Ashwini', 'Bharani'];

        private $id;
        private $name;
        private $startTime;
        private $endTime;

        public function __construct($id, $start, $end);
        public function getName();
        public function getId();
        public function getStartTime();
        public function getEndTime();
    }

    class Tithi {

        public function getPaksha();
    }



    $client->get([
        Panchang,
        PlanetPosition,

    ])


    $client->request(
        [
            new NakshatraRequest($datetime, $location),
            new TithiRequest($datetime, $location),
            new KaranaNakshatra($datetime, $location),
            new YogaNakshatra($datetime, $location),
            new VasaraNakshatra($datetime, $location)
        ]
    )





    /v1/astrology/panchang?params

    [
        {
            "url": "/v1/astrology/panchang?params",
            "params": {

            }
        }
    ]

    Client {
        function request($requests) {
            if (count($requests) === 1) {
                self::doGet(API_BASE . $request->url, $request->params);
            } else if ($count > 1) {
                self::doPost('/', );
            }
        }
    }



    $client = new Prokerala\Common\Api\Client($token);

    $location = new Prokerala\Api\Astrology\Location($lat, $lon, $alt = 0);



    $bride = new Prokerala\Api\Astrology\Profile(\DateTime $dob, ?Location $location = null);
    $bride->setBirthLocation($location);
    $bride->setBirthLocation($lat, $lon, $alt = 0);

    $matcher = new Prokerala\Api\Astrology\HoroscopeMatching($system = TAMIL);

    namespace Prokerala\Api\Astrology;

    // class Client extends Prokerala\Common\Client
    // {
    //     public function setVedicAyanamsa(Ayanamsa::LAHIRI) {

    //     }
    // }

    $client = new Client;

    $matcher->setApiClient($client);

    try {
        $result = $matcher->getMatchResult($bride, $groom);

        $result->getMatchScore();
        $result->getBoyNakshatra();


    } catch (RateLimitExceededException $e) {
    } catch (QuotaExceededException $e) {
    } catch (Exception $e) {

    }

    $mangalDosha = new Prokerala\Api\Astrology\MangalDosha();
    $mangalDosha->getDosha($user);
    $mangalDosha->setAyanamsa($user);

    $result->isManglik();
    $result->getExemption();

    $panchang = new Prokerala\Api\Astrology\Panchang;
    $result = $panchang->getPanchang(Location $location, DateTime $datetime);
    $result->getNakshatra();
    $result->getTithi();
    $result->getKarana();
    $result->getYoga();
    $result->getVaasara();

    $planetPosition = new Prokerala\Api\Astrology\PlanetPosition(Location $location, DateTime $datetime);
    $planetPosition->getPosition($type = PlanetPosition::RASI)


    {
        planet: ,
        degree: ,
        reverse: ,
    }


    POST /
    Host: api.prokerala.com

    [
        {
            "url": "/v1/astrology/nakshatra",
            "params": {
                "request": {
                "datetime": "",
                "latitude": "0.0",
                "longitude": "",
                "altitude": "",
                "ayanamsa": "",
            },
        }
    ]


    [
        {
            "": "",
            "request": {
                "datetime": "",
                "latitude": "0.0",
                "longitude": "",
                "altitude": "",
                "ayanamsa": "",
            },
            "response": {
                "statusCode": 0,
                ["statusMessage": "",]
                "nakshatra": {
                    "id": 1,
                    "start": "2019-04-10T02:03:04Z",
                    "end": "2019-04-10T02:03:04Z"
                }
            }
        }
    ]


    GET /v1/astrology/nakshatra?datetime=&latitude=&longitude=&altitude=&ayanamsa=
    {
        "": "",
        "request": {
            "datetime": "",
            "latitude": "0.0",
            "longitude": "",
            "altitude": "",
            "ayanamsa": "",
        },
        "response": {
            "statusCode": 0,
            ["statusMessage": "",]
            "nakshatra": {
                "id": 1,
                "start": "2019-04-10T02:03:04Z",
                "end": "2019-04-10T02:03:04Z"
            }
        }
    }

    public function calculateHoroscopeMatching($bride_dob, $bridegroom_dob, $bride_coordinates, $bridegroom_coordinates, $ayanamsa = 1, $system = 'kerala')
    {
        $this->request->get('horoscope-matching', compact('bride_dob', 'bridegroom_dob', 'bride_coordinates', 'bridegroom_coordinates', 'ayanamsa', 'system'));
        return $this->request->getResponse()->jsonToArray();
    }

    public function calculateKundaliMatching($bride_dob, $bridegroom_dob, $bride_coordinates, $bridegroom_coordinates, $ayanamsa = 1) {
        $this->request->get('kundli-matching', compact('bride_dob', 'bridegroom_dob', 'bride_coordinates', 'bridegroom_coordinates', 'ayanamsa'));
        return $this->request->getResponse()->jsonToArray();
    }

    public function calculatePanchang($datetime, $coordinates, $ayanamsa = 1)
    {
        $this->request->get('panchang', compact('datetime', 'coordinates', 'ayanamsa'));
        return $this->request->getResponse()->jsonToArray();
    }

    public function calculateManglik($dob, $coordinates, $ayanamsa = 1)
    {
        $this->request->get('manglik', compact('dob', 'coordinates', 'ayanamsa'));
        return $this->request->getResponse()->jsonToArray();
    }

    public function calculateBirthChart($dob, $coordinates, $ayanamsa = 1)
    {
        $this->request->get('birth-chart', compact('dob', 'coordinates', 'ayanamsa'));
        return $this->request->getResponse()->jsonToArray();
    }


    public function getResult() {

        try {
            $result = $matcher->getMatchResult($bride, $groom);

            if ($result->statusCode == 429) {
                throw new QuotaExceededException();
            }

            $result->getMatchScore();
            $result->getBoyNakshatra();


        } catch (RateLimitExceededException $e) {
        } catch (QuotaExceededException $e) {
        } catch (Exception $e) {

        }
    }
}