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

use Prokerala\Api\Astrology\NakshatraProfile;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\AdvancedThirumanaPorutham as AdvancedThirumanaPoruthamResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Message;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\AdvancedMatch as AdvancedMatchResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\BasicMatch as BasicMatchResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham as BasicThirumanaPoruthamResult;
use Prokerala\Api\Astrology\Service\ThirumanaPorutham;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
class ThirumanaPoruthamTest extends BaseTestCase
{
    use AuthenticationTrait;

    public const GIRL_INPUT = [
        'nakshatra' => 0,
        'nakshatra_pada' => 2,
    ];

    public const BOY_INPUT = [
        'nakshatra' => 13,
        'nakshatra_pada' => 3,
    ];
    public const EXPECTED_RESULT = [
        'maximum_points' => 12.0,
        'obtained_points' => 7.0,
        'message' => [
            'type' => null,
            'description' => 'Matching between boy and girl is 7/12',
        ],
        'matches' => [
            [
                'id' => 1,
                'name' => 'Dina Porutham',
                'has_porutham' => false,
                'porutham_status' => null,
                'points' => 0.0,
                'description' => "Their match is deemed to be 'unsuccessful' or 'Athamam' since on counting from birth star of girl to boy – the result shows 14 and that is a bad sign.",
            ],
            [
                'id' => 2,
                'name' => 'Gana Porutham',
                'has_porutham' => false,
                'porutham_status' => null,
                'points' => 0.0,
                'description' => 'Here in this case the girl is of the Deva Ganam and the boy belongs to Asura Ganam. So, it is deemed to be a Athamam relationship – which means they will not be able to live happily.',
            ],
            [
                'id' => 3,
                'name' => 'Mahendra Porutham',
                'has_porutham' => false,
                'porutham_status' => null,
                'points' => 0.0,
                'description' => "This relationship can be declared as an 'Athamam' relationship as on counting the birth star of girl to boy, it can come to the number 14 - which shows that here both will find it difficult to enjoy a smooth relation.",
            ],
            [
                'id' => 4,
                'name' => 'Stree Deergha Porutham',
                'has_porutham' => true,
                'porutham_status' => null,
                'points' => 1.0,
                'description' => "This relationship can be declared as an 'Madhyamam' relationship as on counting the birth star of girl to boy, it can come to the number 14- which shows that here both will adjust with each other.",
            ],
            [
                'id' => 5,
                'name' => 'Yoni Porutham',
                'has_porutham' => true,
                'porutham_status' => null,
                'points' => 1.0,
                'description' => 'The animal in the matching horoscopes are not enemies, So the match is recommended.',
            ],
            [
                'id' => 6,
                'name' => 'Veda Porutham',
                'has_porutham' => true,
                'porutham_status' => null,
                'points' => 1.0,
                'description' => 'For the couples where the birth stars do not have vedha, there is a satisfactory match in their birth stars.',
            ],
            [
                'id' => 7,
                'name' => 'Rajju Porutham',
                'has_porutham' => true,
                'porutham_status' => null,
                'points' => 1.0,
                'description' => 'As per the stars, both belong to different Rajju, and therefore this can be selected as a perfect match.',
            ],
            [
                'id' => 8,
                'name' => 'Rasi Porutham',
                'has_porutham' => true,
                'porutham_status' => null,
                'points' => 1.0,
                'description' => "This match is highly recommended and can be called as 'Ati Uthamam' because on counting the stars from the girl to the boy's rasi – it can be calculated to 7, which shows this to be a very good relationship.",
            ],
            [
                'id' => 9,
                'name' => 'Rasi Lord Porutham',
                'has_porutham' => true,
                'porutham_status' => null,
                'points' => 1.0,
                'description' => 'Since the Ruling Gods of the boy and the girl happens to be neutral, then their match is said to be acceptable.',
            ],
            [
                'id' => 10,
                'name' => 'Vashya Porutham',
                'has_porutham' => false,
                'porutham_status' => null,
                'points' => 0.0,
                'description' => "This is an Athamam relationship since the girl's rasi is not at all compatible to the boy's vasya or even in the opposite manner. Hence this will not be a peaceful relationship.",
            ],
            [
                'id' => 11,
                'name' => 'Nadi Porutham',
                'has_porutham' => true,
                'porutham_status' => null,
                'points' => 1.0,
                'description' => 'Here, since both the boy and the girl, belong to varied Nadi, it can be deemed as a good match.',
            ],
            [
                'id' => 12,
                'name' => 'Varna Porutham',
                'has_porutham' => false,
                'porutham_status' => null,
                'points' => 0.0,
                'description' => 'The girl’s varna is higher than that of the boy, so this match is not deemed to be a good one.',
            ],
        ],
    ];

    public function testProcess()
    {
        $girl_nakshatra = self::GIRL_INPUT['nakshatra'];
        $girl_nakshatra_pada = self::GIRL_INPUT['nakshatra_pada'];
        $girl_profile = new NakshatraProfile($girl_nakshatra, $girl_nakshatra_pada);

        $boy_nakshatra = self::BOY_INPUT['nakshatra'];
        $boy_nakshatra_pada = self::BOY_INPUT['nakshatra_pada'];
        $boy_profile = new NakshatraProfile($boy_nakshatra, $boy_nakshatra_pada);

        $client = $this->setClient();

        $thirumana_porutham = new ThirumanaPorutham($client);
        $test_basic_result = $thirumana_porutham->process($girl_profile, $boy_profile);
        $expected_result = self::EXPECTED_RESULT;
        $message = new Message($expected_result['message']['type'], $expected_result['message']['description']);
        $message_object = (object)$expected_result['message'];
        $arBasicMatch = $arBasicMatchObject = $arAdvancedMatch = $arAdvancedMatchObject = [];
        foreach ($expected_result['matches'] as $match) {
            $arBasicMatch[] = new BasicMatchResult($match['id'], $match['name'], $match['has_porutham']);
            $arAdvancedMatch[] = new AdvancedMatchResult($match['id'], $match['name'], $match['has_porutham'], $match['points'], $match['description']);
            $arBasicMatchObject[] = (object)['id' => $match['id'], 'name' => $match['name'], 'has_porutham' => $match['has_porutham']];
            $arAdvancedMatchObject[] = (object)$match;
        }

        $expected_basic_result = new BasicThirumanaPoruthamResult($expected_result['maximum_points'], $expected_result['obtained_points'], $message, $arBasicMatch);
        $expected_basic_result->setRawResponse((object)[
            'maximum_points' => $expected_result['maximum_points'],
            'obtained_points' => $expected_result['obtained_points'],
            'message' => $message_object,
            'matches' => $arBasicMatchObject,
        ]);

        $this->assertEquals($expected_basic_result, $test_basic_result);

        $test_advanced_result = $thirumana_porutham->process($girl_profile, $boy_profile, true);
        $expected_advanced_result = new AdvancedThirumanaPoruthamResult($expected_result['maximum_points'], $expected_result['obtained_points'], $message, $arAdvancedMatch);
        $expected_advanced_result->setRawResponse((object)[
            'maximum_points' => $expected_result['maximum_points'],
            'obtained_points' => $expected_result['obtained_points'],
            'message' => $message_object,
            'matches' => $arAdvancedMatchObject,
        ]);

        $this->assertEquals($expected_advanced_result, $test_advanced_result);
    }
}
