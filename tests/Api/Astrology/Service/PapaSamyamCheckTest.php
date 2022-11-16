<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Test\Api\Astrology\Service;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam as PapasamyamResult;
use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapaPlanet;
use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails;
use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PlanetDoshaDetails;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Message;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\PapaSamyamCheck as PapaSamyamCheckResult;
use Prokerala\Api\Astrology\Service\PapaSamyamCheck;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
class PapaSamyamCheckTest extends BaseTestCase
{
    use AuthenticationTrait;

    public const GIRL_INPUT = [
        'datetime' => '1967-08-29T09:00:00+05:30',
        'latitude' => '19.0821978',
        'longitude' => '72.7411014', // Mumbai
    ];

    public const BOY_INPUT = [
        'datetime' => '1970-11-10T09:20:00+05:30',
        'latitude' => '22.6757521',
        'longitude' => '88.0495418', // Kolkata
    ];

    public const EXPECTED_RESULT = [
        'girl_papasamyam' => [
            'total_points' => 5.5,
            'papa_samyam' => [
                'papa_planet' => [
                    [
                        'name' => 'Ascendant',
                        'planet_dosha' => [
                            [
                                'id' => 4,
                                'name' => 'Mars',
                                'position' => 2,
                                'has_dosha' => true,
                            ],
                            [
                                'id' => 6,
                                'name' => 'Saturn',
                                'position' => 7,
                                'has_dosha' => true,
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
                                'position' => 8,
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
                                'position' => 6,
                                'has_dosha' => false,
                            ],
                            [
                                'id' => 6,
                                'name' => 'Saturn',
                                'position' => 11,
                                'has_dosha' => false,
                            ],
                            [
                                'id' => 0,
                                'name' => 'Sun',
                                'position' => 4,
                                'has_dosha' => true,
                            ],
                            [
                                'id' => 101,
                                'name' => 'Rahu',
                                'position' => 12,
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
                                'position' => 3,
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
                                'position' => 1,
                                'has_dosha' => true,
                            ],
                            [
                                'id' => 101,
                                'name' => 'Rahu',
                                'position' => 9,
                                'has_dosha' => false,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'boy_papasamyam' => [
            'total_points' => 2.75,
            'papa_samyam' => [
                'papa_planet' => [
                    [
                        'name' => 'Ascendant',
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
                                'position' => 5,
                                'has_dosha' => false,
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
                                'position' => 3,
                                'has_dosha' => false,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Moon',
                        'planet_dosha' => [
                            [
                                'id' => 4,
                                'name' => 'Mars',
                                'position' => 7,
                                'has_dosha' => true,
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
                                'position' => 8,
                                'has_dosha' => true,
                            ],
                            [
                                'id' => 101,
                                'name' => 'Rahu',
                                'position' => 12,
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
                                'position' => 12,
                                'has_dosha' => true,
                            ],
                            [
                                'id' => 6,
                                'name' => 'Saturn',
                                'position' => 7,
                                'has_dosha' => true,
                            ],
                            [
                                'id' => 0,
                                'name' => 'Sun',
                                'position' => 1,
                                'has_dosha' => true,
                            ],
                            [
                                'id' => 101,
                                'name' => 'Rahu',
                                'position' => 5,
                                'has_dosha' => false,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'message' => [
            'type' => 'Not Satisfactory',
            'description' => 'Girl has more dosha than boy. Hence this combination is Not Satisfactory',
        ],
    ];

    public function testProcess()
    {
        $girl_location = new Location(self::GIRL_INPUT['latitude'], self::GIRL_INPUT['longitude']);
        $girl_dob = new \DateTimeImmutable(self::GIRL_INPUT['datetime']);
        $girl_profile = new Profile($girl_location, $girl_dob);

        $boy_location = new Location(self::BOY_INPUT['latitude'], self::BOY_INPUT['longitude']);
        $boy_dob = new \DateTimeImmutable(self::BOY_INPUT['datetime']);
        $boy_profile = new Profile($boy_location, $boy_dob);
        $client = $this->getClient();

        $papaSamyamCheck = new PapaSamyamCheck($client);
        $test_result = $papaSamyamCheck->process($girl_profile, $boy_profile);

        $result = self::EXPECTED_RESULT;

        $arPapasamyam = [];
        foreach (['girl_papasamyam' => $result['girl_papasamyam'], 'boy_papasamyam' => $result['boy_papasamyam']] as $index => $papasamyam) {
            $arPapaPlanets = [];
            $arPapaPlanetObject = [];
            foreach ($papasamyam['papa_samyam']['papa_planet'] as $papa_planet) {
                $arPlanetDosha = [];
                $arPlanetDoshaObject = [];
                foreach ($papa_planet['planet_dosha'] as $planet_dosha) {
                    $arPlanetDosha[] = new PlanetDoshaDetails($planet_dosha['id'], $planet_dosha['name'], $planet_dosha['position'], $planet_dosha['has_dosha']);
                    $arPlanetDoshaObject[] = (object)$planet_dosha;
                }
                $arPapaPlanets[] = new PapaPlanet($papa_planet['name'], $arPlanetDosha);
                $arPapaPlanetObject[] = (object)['name' => $papa_planet['name'], 'planet_dosha' => $arPlanetDoshaObject];
            }
            $papasamyamDetails = new PapasamyamDetails($arPapaPlanets);
            $papasamyamDetailObject = (object)['papa_planet' => $arPapaPlanetObject];

            $arPapasamyam[$index] = new PapasamyamResult($result[$index]['total_points'], $papasamyamDetails);
            $arPapasamyamObject[$index] = ((object)['total_points' => $result[$index]['total_points'], 'papa_samyam' => $papasamyamDetailObject]);
        }
        $message = new Message($result['message']['type'], $result['message']['description']);
        $message_object = (object)$result['message'];

        $expected_result = new PapaSamyamCheckResult($arPapasamyam['girl_papasamyam'], $arPapasamyam['boy_papasamyam'], $message);
        $expected_result->setRawResponse((object)['girl_papasamyam' => $arPapasamyamObject['girl_papasamyam'], 'boy_papasamyam' => $arPapasamyamObject['boy_papasamyam'], 'message' => $message_object]);

        $this->assertEquals($expected_result, $test_result);
    }
}
