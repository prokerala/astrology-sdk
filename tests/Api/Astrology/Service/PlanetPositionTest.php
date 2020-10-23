<?php

namespace Prokerala\Tests\Api\Astrology\Service;

use DateTime;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Service\PlanetPosition;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;
use Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\Element\Planet as Lord;
use Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition as PlanetPositionResult;

class PlanetPositionTest extends BaseTestCase
{
    use AuthenticationTrait;
    const INPUT = [
        'datetime' => '2020-05-12T09:20:00+05:30',
        'latitude' => '22.6757521',
        'longitude' => '88.0495418', // Kolkata
    ];

    const EXPECTED_RESULT = [
        "planet_position" => [
            [
                "id" => 0,
                "name" => "Sun",
                "longitude" => 27.74609593454602,
                "is_retrograde" => false,
                "position" => 1,
                "degree" => 27.74609593454602,
                "rasi" => [
                    "id" => 0,
                    "name" => "Mesha",
                    "lord" => [
                        "id" => 4,
                        "name" => "Mars",
                        "vedic_name" => "Kuja"
                    ]
                ]
            ],
            [
                "id" => 1,
                "name" => "Moon",
                "longitude" => 269.4838051268769,
                "is_retrograde" => false,
                "position" => 9,
                "degree" => 29.483805126876916,
                "rasi" => [
                    "id" => 8,
                    "name" => "Dhanu",
                    "lord" => [
                        "id" => 5,
                        "name" => "Jupiter",
                        "vedic_name" => "Guru"
                    ]
                ]
            ],
            [
                "id" => 2,
                "name" => "Mercury",
                "longitude" => 36.37588971697262,
                "is_retrograde" => false,
                "position" => 2,
                "degree" => 6.3758897169726225,
                "rasi" => [
                    "id" => 1,
                    "name" => "Vrishabha",
                    "lord" => [
                        "id" => 3,
                        "name" => "Venus",
                        "vedic_name" => "Shukra"
                    ]
                ]
            ],
            [
                "id" => 3,
                "name" => "Venus",
                "longitude" => 57.6740599046385,
                "is_retrograde" => false,
                "position" => 2,
                "degree" => 27.674059904638497,
                "rasi" => [
                    "id" => 1,
                    "name" => "Vrishabha",
                    "lord" => [
                        "id" => 3,
                        "name" => "Venus",
                        "vedic_name" => "Shukra"
                    ]
                ]
            ],
            [
                "id" => 4,
                "name" => "Mars",
                "longitude" => 305.1616767462532,
                "is_retrograde" => false,
                "position" => 11,
                "degree" => 5.1616767462531925,
                "rasi" => [
                    "id" => 10,
                    "name" => "Kumbha",
                    "lord" => [
                        "id" => 6,
                        "name" => "Saturn",
                        "vedic_name" => "Shani"
                    ]
                ]
            ],
            [
                "id" => 5,
                "name" => "Jupiter",
                "longitude" => 273.08937336468364,
                "is_retrograde" => false,
                "position" => 10,
                "degree" => 3.089373364683638,
                "rasi" => [
                    "id" => 9,
                    "name" => "Makara",
                    "lord" => [
                        "id" => 6,
                        "name" => "Saturn",
                        "vedic_name" => "Shani"
                    ]
                ]
            ],
            [
                "id" => 6,
                "name" => "Saturn",
                "longitude" => 277.81463151995825,
                "is_retrograde" => true,
                "position" => 10,
                "degree" => 7.814631519958255,
                "rasi" => [
                    "id" => 9,
                    "name" => "Makara",
                    "lord" => [
                        "id" => 6,
                        "name" => "Saturn",
                        "vedic_name" => "Shani"
                    ]
                ]
            ],
            [
                "id" => 100,
                "name" => "Ascendant",
                "longitude" => 89.3523119514714,
                "is_retrograde" => false,
                "position" => 3,
                "degree" => 29.352311951471407,
                "rasi" => [
                    "id" => 2,
                    "name" => "Mithuna",
                    "lord" => [
                        "id" => 2,
                        "name" => "Mercury",
                        "vedic_name" => "Budha"
                    ]
                ]
            ],
            [
                "id" => 101,
                "name" => "Rahu",
                "longitude" => 67.09893640328198,
                "is_retrograde" => false,
                "position" => 3,
                "degree" => 7.098936403281982,
                "rasi" => [
                    "id" => 2,
                    "name" => "Mithuna",
                    "lord" => [
                        "id" => 2,
                        "name" => "Mercury",
                        "vedic_name" => "Budha"
                    ]
                ]
            ],
            [
                "id" => 102,
                "name" => "Ketu",
                "longitude" => 247.09893640328198,
                "is_retrograde" => false,
                "position" => 9,
                "degree" => 7.098936403281982,
                "rasi" => [
                    "id" => 8,
                    "name" => "Dhanu",
                    "lord" => [
                        "id" => 5,
                        "name" => "Jupiter",
                        "vedic_name" => "Guru"
                    ]
                ]
            ]
        ]
    ];

    public function testProcess()
    {
        $datetime = new DateTime(self::INPUT['datetime']);
        $tz = $datetime->getTimezone();
        $location = new Location(self::INPUT['latitude'], self::INPUT['longitude'], 0, $tz);
        $client = $this->setClient();
        $method = new PlanetPosition($client);
        $test_result =  $method->process($location, $datetime);

        $result = self::EXPECTED_RESULT;
        $arPlanet = $arPlanetObject = [];
        foreach ($result['planet_position'] as $planet_position) {
            $lordData = $planet_position['rasi']['lord'];
            $lordObject = (object)$lordData;
            $lord = new Lord($lordData['id'], $lordData['name'], $lordData['vedic_name']);
            $rasi = new Rasi($planet_position['rasi']['id'], $planet_position['rasi']['name'], $lord);
            $rasiObject = (object)$planet_position['rasi'];
            $rasiObject->lord = $lordObject;
            $arPlanet[] = new Planet($planet_position['id'], $planet_position['name'], $planet_position['longitude'], $planet_position['is_retrograde'], $planet_position['position'], $planet_position['degree'], $rasi);
            $planetObject = (object)$planet_position;
            $planetObject->rasi = $rasiObject;
            $arPlanetObject[] = $planetObject;
        }
        $expected_result = new PlanetPositionResult($arPlanet);
        $expected_result->setRawResponse((object)['planet_position' => $arPlanetObject]);
        $this->assertEquals($expected_result, $test_result);

    }
}
