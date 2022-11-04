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

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Planet;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\Element\Zodiac;
use Prokerala\Api\Astrology\Result\Horoscope\BirthDetails as NakshatraResult;
use Prokerala\Api\Astrology\Result\Horoscope\Nakshatra\NakshatraInfo;
use Prokerala\Api\Astrology\Service\BirthDetails;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
class BirthDetailsTest extends BaseTestCase
{
    use AuthenticationTrait;

    public const INPUT = [
        'datetime' => '1967-08-29T09:00:00+05:30',
        'latitude' => '19.0821978',
        'longitude' => '72.7411014', // Mumbai
    ];

    public const EXPECTED_RESULT = [
        'nakshatra' => [
            'id' => 3,
            'name' => 'Rohini',
            'lord' => [
                'id' => 1,
                'name' => 'Moon',
                'vedic_name' => 'Chandra',
            ],
            'pada' => 4,
        ],
        'chandra_rasi' => [
            'id' => 1,
            'name' => 'Vrishabha',
            'lord' => [
                'id' => 3,
                'name' => 'Venus',
                'vedic_name' => 'Shukra',
            ],
        ],
        'soorya_rasi' => [
            'id' => 4,
            'name' => 'Simha',
            'lord' => [
                'id' => 0,
                'name' => 'Sun',
                'vedic_name' => 'Ravi',
            ],
        ],
        'zodiac' => [
            'id' => 5,
            'name' => 'Virgo',
        ],
        'additional_info' => [
            'deity' => 'Brahma',
            'ganam' => 'Manushya',
            'symbol' => 'Chariot (An ox cart)',
            'animal_sign' => 'Snake',
            'nadi' => 'Kapha',
            'color' => 'White',
            'best_direction' => 'East',
            'syllables' => 'O, Va, Vi, Vu',
            'birth_stone' => 'Pearl',
            'gender' => 'female',
            'planet' => 'Chandra',
            'enemy_yoni' => 'Mongoose',
        ],
    ];

    public function testProcess()
    {
        $datetime = new \DateTimeImmutable(self::INPUT['datetime']);
        $tz = $datetime->getTimezone();
        $location = new Location(self::INPUT['latitude'], self::INPUT['longitude'], 0, $tz);
        $client = $this->setClient();

        $method = new BirthDetails($client);
        $test_result = $method->process($location, $datetime);

        $result = self::EXPECTED_RESULT;

        $nakshatra_lord = new Planet($result['nakshatra']['lord']['id'], $result['nakshatra']['lord']['name'], $result['nakshatra']['lord']['vedic_name']);
        $nakshatra_lord_object = (object)$result['nakshatra']['lord'];
        $nakshatra = new Nakshatra($result['nakshatra']['id'], $result['nakshatra']['name'], $nakshatra_lord, $result['nakshatra']['pada']);
        $nakshatra_object = (object)$result['nakshatra'];
        $nakshatra_object->lord = $nakshatra_lord_object;

        $chandra_rasi_lord = new Planet($result['chandra_rasi']['lord']['id'], $result['chandra_rasi']['lord']['name'], $result['chandra_rasi']['lord']['vedic_name']);
        $chandra_rasi_lord_object = (object)$result['chandra_rasi']['lord'];
        $chandra_rasi = new Rasi($result['chandra_rasi']['id'], $result['chandra_rasi']['name'], $chandra_rasi_lord);
        $chandra_rasi_object = (object)$result['chandra_rasi'];
        $chandra_rasi_object->lord = $chandra_rasi_lord_object;

        $soorya_rasi_lord = new Planet($result['soorya_rasi']['lord']['id'], $result['soorya_rasi']['lord']['name'], $result['soorya_rasi']['lord']['vedic_name']);
        $soorya_rasi_lord_object = (object)$result['soorya_rasi']['lord'];
        $soorya_rasi = new Rasi($result['soorya_rasi']['id'], $result['soorya_rasi']['name'], $soorya_rasi_lord);
        $soorya_rasi_object = (object)$result['soorya_rasi'];
        $soorya_rasi_object->lord = $soorya_rasi_lord_object;

        $zodiac = new Zodiac($result['zodiac']['id'], $result['zodiac']['name']);
        $zodiac_object = (object)$result['zodiac'];

        $additional_info = new NakshatraInfo($result['additional_info']['deity'], $result['additional_info']['ganam'], $result['additional_info']['symbol'], $result['additional_info']['animal_sign'], $result['additional_info']['nadi'], $result['additional_info']['color'], $result['additional_info']['best_direction'], $result['additional_info']['syllables'], $result['additional_info']['birth_stone'], $result['additional_info']['gender'], $result['additional_info']['planet'], $result['additional_info']['enemy_yoni']);
        $additional_info_object = (object)$result['additional_info'];

        $expected_result = new NakshatraResult($nakshatra, $chandra_rasi, $soorya_rasi, $zodiac, $additional_info);
        $expected_result->setRawResponse((object)['nakshatra' => $nakshatra_object, 'chandra_rasi' => $chandra_rasi_object, 'soorya_rasi' => $soorya_rasi_object, 'zodiac' => $zodiac_object, 'additional_info' => $additional_info_object]);
        $this->assertEquals($expected_result, $test_result);
    }
}
