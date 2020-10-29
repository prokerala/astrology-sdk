<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Tests\Api\Astrology\Service;

use DateTime;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam as PapasamyamResult;
use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapaPlanet;
use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails;
use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PlanetDoshaDetails;
use Prokerala\Api\Astrology\Service\Papasamyam;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
class PapasamyamTest extends BaseTestCase
{
    use AuthenticationTrait;

    const INPUT = [
        'datetime' => '2020-05-12T09:20:00+05:30',
        'latitude' => '22.6757521',
        'longitude' => '88.0495418', // Kolkata
    ];

    const EXPECTED_RESULT = [
        'total_points' => 3.5,
        'papa_samyam' => [
            'papa_planet' => [
                [
                    'name' => 'Ascendant',
                    'planet_dosha' => [
                        [
                            'id' => 4,
                            'name' => 'Mars',
                            'position' => 9,
                            'has_dosha' => false,
                        ],
                        [
                            'id' => 6,
                            'name' => 'Saturn',
                            'position' => 8,
                            'has_dosha' => true,
                        ],
                        [
                            'id' => 0,
                            'name' => 'Sun',
                            'position' => 11,
                            'has_dosha' => false,
                        ],
                        [
                            'id' => 101,
                            'name' => 'Rahu',
                            'position' => 1,
                            'has_dosha' => true,
                        ],
                    ],
                ],
                [
                    'name' => 'Moon',
                    'planet_dosha' => [
                        [
                            'id' => 4,
                            'name' => 'Mars',
                            'position' => 3,
                            'has_dosha' => false,
                        ],
                        [
                            'id' => 6,
                            'name' => 'Saturn',
                            'position' => 2,
                            'has_dosha' => true,
                        ],
                        [
                            'id' => 0,
                            'name' => 'Sun',
                            'position' => 5,
                            'has_dosha' => false,
                        ],
                        [
                            'id' => 101,
                            'name' => 'Rahu',
                            'position' => 7,
                            'has_dosha' => true,
                        ],
                    ],
                ],
                [
                    'name' => 'Venus',
                    'planet_dosha' => [
                        [
                            'id' => 4,
                            'name' => 'Mars',
                            'position' => 10,
                            'has_dosha' => false,
                        ],
                        [
                            'id' => 6,
                            'name' => 'Saturn',
                            'position' => 9,
                            'has_dosha' => false,
                        ],
                        [
                            'id' => 0,
                            'name' => 'Sun',
                            'position' => 12,
                            'has_dosha' => true,
                        ],
                        [
                            'id' => 101,
                            'name' => 'Rahu',
                            'position' => 2,
                            'has_dosha' => true,
                        ],
                    ],
                ],
            ],
        ],
    ];

    public function testProcess()
    {
        $datetime = new DateTime(self::INPUT['datetime']);
        $tz = $datetime->getTimezone();
        $location = new Location(self::INPUT['latitude'], self::INPUT['longitude'], 0, $tz);
        $client = $this->setClient();
        $method = new Papasamyam($client);
        $test_result = $method->process($location, $datetime);
        $result = self::EXPECTED_RESULT;

        $arPapaPlanets = [];
        $arPapaPlanetObject = [];
        foreach ($result['papa_samyam']['papa_planet'] as $papa_planet) {
            $arPlanetDosha = [];
            $arPlanetDoshaObject = [];
            foreach ($papa_planet['planet_dosha'] as $planet_dosha) {
                $arPlanetDosha[] = new PlanetDoshaDetails($planet_dosha['id'], $planet_dosha['name'], $planet_dosha['position'], $planet_dosha['has_dosha']);
                $arPlanetDoshaObject[] = (object) $planet_dosha;
            }
            $arPapaPlanets[] = new PapaPlanet($papa_planet['name'], $arPlanetDosha);
            $arPapaPlanetObject[] = (object) ['name' => $papa_planet['name'], 'planet_dosha' => $arPlanetDoshaObject];
        }
        $papasamyamDetails = new PapasamyamDetails($arPapaPlanets);
        $papasamyamDetailObject = (object) ['papa_planet' => $arPapaPlanetObject];

        $expected_result = new PapasamyamResult($result['total_points'], $papasamyamDetails);
        $expected_result->setRawResponse((object) ['total_points' => $result['total_points'], 'papa_samyam' => $papasamyamDetailObject]);
        $this->assertEquals($expected_result, $test_result);
    }
}
