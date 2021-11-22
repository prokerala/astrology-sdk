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
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Planet;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\AdvancedPorutham as AdvancedMatchResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Message;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\AdvancedMatch;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham as BasicMatchResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\BasicMatch;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\Profile as ProfileInfo;
use Prokerala\Api\Astrology\Service\Porutham;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
class PoruthamTest extends BaseTestCase
{
    use AuthenticationTrait;
    const GIRL_INPUT = [
        'datetime' => '1967-08-29T09:00:00+05:30',
        'latitude' => '19.0821978',
        'longitude' => '72.7411014', // Mumbai
    ];

    const BOY_INPUT = [
        'datetime' => '1970-11-10T09:20:00+05:30',
        'latitude' => '22.6757521',
        'longitude' => '88.0495418', // Kolkata
    ];

    const EXPECTED_RESULT = [
        'kerala' => [
            'girl_info' => [
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
                'rasi' => [
                    'id' => 1,
                    'name' => 'Vrishabha',
                    'lord' => [
                        'id' => 3,
                        'name' => 'Venus',
                        'vedic_name' => 'Shukra',
                    ],
                ],
            ],
            'boy_info' => [
                'nakshatra' => [
                    'id' => 25,
                    'name' => 'Uttara Bhadrapada',
                    'lord' => [
                        'id' => 6,
                        'name' => 'Saturn',
                        'vedic_name' => 'Shani',
                    ],
                    'pada' => 3,
                ],
                'rasi' => [
                    'id' => 11,
                    'name' => 'Meena',
                    'lord' => [
                        'id' => 2,
                        'name' => 'Mercury',
                        'vedic_name' => 'Budha',
                    ],
                ],
            ],
            'maximum_points' => 10.0,
            'total_points' => 6.5,
            'message' => [
                'type' => 'Good',
                'description' => 'Marriage Compatibility is Uthama',
            ],
            'matches' => [
                [
                    'id' => 1,
                    'name' => 'Dina Porutham',
                    'has_porutham' => false,
                    'porutham_status' => 'Not Satisfactory',
                    'points' => 0.0,
                    'description' => "The availability of dina porutham in the charting denotes good health and prosperity for both the husband and the wife with freedom from poverty, sicknesses and disease; the two are therefore expected to enjoy all comforts in a long and a happy married life. Boy's nakshatra Uttara Bhadrapada is in 23rd position from girl's nakshatra Rohini. For this couple Dina Porutham is Not Satisfactory.",
                ],
                [
                    'id' => 2,
                    'name' => 'Gana Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => 'Gana porutham takes into account the matching of the nature of both the boy and the girl to assure compatibility of mind, body and sensuality after marriage. The girl belongs to Manushya gana and boy belongs to Manushya gana. For this couple Gana Porutham is Good.',
                ],
                [
                    'id' => 3,
                    'name' => 'Mahendra Porutham',
                    'has_porutham' => false,
                    'porutham_status' => 'Not Satisfactory',
                    'points' => 0.0,
                    'description' => "Mahendra Porutham is considered for the longevity, wealth and progeny. According to this, the family will have children and prosperity. Also, the husband will have the capability of protecting his wife and their children from evil of the world and provide for them in kind and in finances. Boy's Nakshatra Uttara Bhadrapada is in 23rd position from girl's nakshatra Rohini. For this couple Mahendra Porutham is Not Satisfactory.",
                ],
                [
                    'id' => 4,
                    'name' => 'Stree Deergha Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => "Stree deergha porutham ensures the female counterpart's well being, longevity and prosperity. Boy's Nakshatra Uttara Bhadrapada counted from Girl's nakshatra Rohini is in 23rd position. For this couple Stree Deergha Porutham is Good.",
                ],
                [
                    'id' => 5,
                    'name' => 'Yoni Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Satisfactory',
                    'points' => 0.5,
                    'description' => "Yoni Porutham is important because this is the porutham which helps in determining the sexual compatibility between the couple after marriage. Boy's nakshatra belongs to female yoni and girl's nakshatra belongs to female yoni. For this couple Yoni Porutham is Satisfactory.",
                ],
                [
                    'id' => 6,
                    'name' => 'Veda Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => "The Vedha Porutham talks about the feasibility or possibility of the couples living together. That is, the perfect Vedha Porutham assures that the couples live together and do not get separated under any circumstances. Boy's nakshatra and Girl's nakshatra have no affliction. So there is veda porutham. For this couple Veda Porutham is Good.",
                ],
                [
                    'id' => 7,
                    'name' => 'Rajju Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => 'Rajju porutham is said to be the most important porutham, as it denotes longevity of the boy in the married life. Boys rajju is Madhyama and Girls rajju is Anthima. For this couple Rajju Porutham is Good.',
                ],
                [
                    'id' => 8,
                    'name' => 'Rasi Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => "Rasi Porutham is well known to represent compatibility of the birth stars or the zodiac signs of the couple. Prosperous life is said to belong to those whose Rasi porutham is found compatible. Boy's rasi is Meena and Girl's rasi is Vrishabha. Boy's rasi  Meena is in 11th position from Girl's rasi Vrishabha. For this couple Rasi Porutham is Good.",
                ],
                [
                    'id' => 9,
                    'name' => 'Rasyadhipa Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => 'Rasyadhipa Porutham refers to the birth stars of both the girl and the boy with their lords who should be in friendship with each other for a compatible marriage.  If the lords of the birth stars of the boy are in friendship with the lords of the birth stars of the girl the marriage will be a happy and a longlasting one. Boys rasyadhipan is Jupiter and girls rasyadhipan is Venus. Jupiter and Venus are friends. For this couple Rasyadhipa Porutham is Good.',
                ],
                [
                    'id' => 10,
                    'name' => 'Vashya Porutham',
                    'has_porutham' => false,
                    'porutham_status' => 'Not Satisfactory',
                    'points' => 0.0,
                    'description' => "Vasya porutham denotes compatibility between the zodiac signs of the couple that is to get married. Therefore, if there is agreement between their kootas, this enables mutual love and affection to be enhanced and to continue between the man and the wife. Boy's rasi is Meena and Girl's rasi is Vrishabha. Here Boy's rasi is not the vasya rasi of Girl's rasi. For this couple Vashya Porutham is Not Satisfactory.",
                ],
            ],
        ],
        'tamil' => [
            'girl_info' => [
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
                'rasi' => [
                    'id' => 1,
                    'name' => 'Vrishabha',
                    'lord' => [
                        'id' => 3,
                        'name' => 'Venus',
                        'vedic_name' => 'Shukra',
                    ],
                ],
            ],
            'boy_info' => [
                'nakshatra' => [
                    'id' => 25,
                    'name' => 'Uttara Bhadrapada',
                    'lord' => [
                        'id' => 6,
                        'name' => 'Saturn',
                        'vedic_name' => 'Shani',
                    ],
                    'pada' => 3,
                ],
                'rasi' => [
                    'id' => 11,
                    'name' => 'Meena',
                    'lord' => [
                        'id' => 2,
                        'name' => 'Mercury',
                        'vedic_name' => 'Budha',
                    ],
                ],
            ],
            'maximum_points' => 10.0,
            'total_points' => 6.5,
            'message' => [
                'type' => 'Good',
                'description' => 'Marriage Compatibility is Uthama',
            ],
            'matches' => [
                [
                    'id' => 1,
                    'name' => 'Dina Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => "The availability of dina porutham in the charting denotes good health and prosperity for both the husband and the wife with freedom from poverty, sicknesses and disease; the two are therefore expected to enjoy all comforts in a long and a happy married life. Boy's nakshatra Uttara Bhadrapada is in 23rd position from girl's nakshatra Rohini. For this couple Dina Porutham is Good.",
                ],
                [
                    'id' => 2,
                    'name' => 'Gana Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => 'Gana porutham takes into account the matching of the nature of both the boy and the girl to assure compatibility of mind, body and sensuality after marriage. The girl belongs to Manushya gana and boy belongs to Manushya gana. For this couple Gana Porutham is Good.',
                ],
                [
                    'id' => 3,
                    'name' => 'Mahendra Porutham',
                    'has_porutham' => false,
                    'porutham_status' => 'Not Satisfactory',
                    'points' => 0.0,
                    'description' => "Mahendra Porutham is considered for the longevity, wealth and progeny. According to this, the family will have children and prosperity. Also, the husband will have the capability of protecting his wife and their children from evil of the world and provide for them in kind and in finances. Boy's Nakshatra Uttara Bhadrapada is in 23rd position from girl's nakshatra Rohini. For this couple Mahendra Porutham is Not Satisfactory.",
                ],
                [
                    'id' => 4,
                    'name' => 'Stree Deergha Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => "Stree deergha porutham ensures the female counterpart's well being, longevity and prosperity. Boy's Nakshatra Uttara Bhadrapada counted from Girl's nakshatra Rohini is above 13th position. For this couple Stree Deergha Porutham is Good.",
                ],
                [
                    'id' => 5,
                    'name' => 'Yoni Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Satisfactory',
                    'points' => 0.5,
                    'description' => "Yoni Porutham is important because this is the porutham which helps in determining the sexual compatibility between the couple after marriage. Boy's Nakshatra belongs to Female Constellation and Girl's nakshatra belongs to Male Constellation. Boy's Yoni and Girl's are not enemies. So it will turn out to be a happy one. For this couple Yoni Porutham is Satisfactory.",
                ],
                [
                    'id' => 6,
                    'name' => 'Veda Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => "The Vedha Porutham talks about the feasibility or possibility of the couples living together. That is, the perfect Vedha Porutham assures that the couples live together and do not get separated under any circumstances. Boy's nakshatra and Girl's nakshatra have no affliction. So there is veda porutham. For this couple Veda Porutham is Good.",
                ],
                [
                    'id' => 7,
                    'name' => 'Rajju Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Satisfactory',
                    'points' => 0.5,
                    'description' => "Rajju porutham is said to be the most important porutham, as it denotes longevity of the boy in the married life. Boy's Nakshatra Uttara Bhadrapada is in the Kati rajju and girls Nakshatra Rohini is in the Kanta rajju. But Nakshatra's are in Ascending and Descending order. For this couple Rajju Porutham is Satisfactory.",
                ],
                [
                    'id' => 8,
                    'name' => 'Rasi Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Good',
                    'points' => 1.0,
                    'description' => "Rasi Porutham is well known to represent compatibility of the birth stars or the zodiac signs of the couple. Prosperous life is said to belong to those whose Rasi porutham is found compatible. Boy's rasi is Meena and Girl's rasi is Vrishabha. Boy's rasi  Meena is in 11th position from Girl's rasi Vrishabha, The married life will be very happy. For this couple Rasi Porutham is Good.",
                ],
                [
                    'id' => 9,
                    'name' => 'Rasyadhipa Porutham',
                    'has_porutham' => true,
                    'porutham_status' => 'Satisfactory',
                    'points' => 0.5,
                    'description' => 'Rasyadhipa Porutham refers to the birth stars of both the girl and the boy with their lords who should be in friendship with each other for a compatible marriage.  If the lords of the birth stars of the boy are in friendship with the lords of the birth stars of the girl the marriage will be a happy and a longlasting one. Boys rasyadhipan is Jupiter and girls rasyadhipan is Venus.  Both Grahas are neutral. For this couple Rasyadhipa Porutham is Satisfactory.',
                ],
                [
                    'id' => 10,
                    'name' => 'Vasya Porutham',
                    'has_porutham' => false,
                    'porutham_status' => 'Not Satisfactory',
                    'points' => 0.0,
                    'description' => "Vasya porutham denotes compatibility between the zodiac signs of the couple that is to get married. Therefore, if there is agreement between their kootas, this enables mutual love and affection to be enhanced and to continue between the man and the wife. Boy's rasi is Meena and Girl's rasi is Vrishabha. Here Boy's rasi is not the vasya rasi of Girl's rasi. For this couple Vasya Porutham is Not Satisfactory.",
                ],
            ],
        ],
    ];

    public function testProcess()
    {
        $girl_location = new Location(self::GIRL_INPUT['latitude'], self::GIRL_INPUT['longitude']);
        $girl_dob = new DateTime(self::GIRL_INPUT['datetime']);
        $girl_profile = new Profile($girl_location, $girl_dob);

        $boy_location = new Location(self::BOY_INPUT['latitude'], self::BOY_INPUT['longitude']);
        $boy_dob = new DateTime(self::BOY_INPUT['datetime']);
        $boy_profile = new Profile($boy_location, $boy_dob);
        $client = $this->setClient();

        $porutham = new Porutham($client);
        $basic_kerala_test_result = $porutham->process($girl_profile, $boy_profile, 'kerala');
        $kerala_result = self::EXPECTED_RESULT['kerala'];
        $girl_details = $kerala_result['girl_info'];
        $boy_details = $kerala_result['boy_info'];

        $girl_nakshatra_lord = new Planet($girl_details['nakshatra']['lord']['id'], $girl_details['nakshatra']['lord']['name'], $girl_details['nakshatra']['lord']['vedic_name']);
        $girl_nakshatra = new Nakshatra($girl_details['nakshatra']['id'], $girl_details['nakshatra']['name'], $girl_nakshatra_lord, $girl_details['nakshatra']['pada']);

        $girl_rasi_lord = new Planet($girl_details['rasi']['lord']['id'], $girl_details['rasi']['lord']['name'], $girl_details['rasi']['lord']['vedic_name']);
        $girl_rasi = new Rasi($girl_details['rasi']['id'], $girl_details['rasi']['name'], $girl_rasi_lord);

        $girl_info = new ProfileInfo($girl_nakshatra, $girl_rasi);

        $boy_nakshatra_lord = new Planet($boy_details['nakshatra']['lord']['id'], $boy_details['nakshatra']['lord']['name'], $boy_details['nakshatra']['lord']['vedic_name']);
        $boy_nakshatra = new Nakshatra($boy_details['nakshatra']['id'], $boy_details['nakshatra']['name'], $boy_nakshatra_lord, $boy_details['nakshatra']['pada']);

        $boy_rasi_lord = new Planet($boy_details['rasi']['lord']['id'], $boy_details['rasi']['lord']['name'], $boy_details['rasi']['lord']['vedic_name']);
        $boy_rasi = new Rasi($boy_details['rasi']['id'], $boy_details['rasi']['name'], $boy_rasi_lord);

        $boy_info = new ProfileInfo($boy_nakshatra, $boy_rasi);
        $girl_details['nakshatra']['lord'] = (object) $girl_details['nakshatra']['lord'];
        $girl_details['rasi']['lord'] = (object) $girl_details['rasi']['lord'];
        $boy_details['nakshatra']['lord'] = (object) $boy_details['nakshatra']['lord'];
        $boy_details['rasi']['lord'] = (object) $boy_details['rasi']['lord'];

        $message = new Message($kerala_result['message']['type'], $kerala_result['message']['description']);

        $advanced_match_result = $advanced_match_object = $basic_match_result = $basic_match_object = [];

        foreach ($kerala_result['matches'] as $match) {
            $advanced_match_result[] = new AdvancedMatch($match['id'], $match['name'], $match['has_porutham'], $match['points'], $match['description'], $match['porutham_status']);
            $basic_match_result[] = new BasicMatch($match['id'], $match['name'], $match['has_porutham']);
            $basic_match_object[] = (object) [
                'id' => $match['id'],
                'name' => $match['name'],
                'has_porutham' => $match['has_porutham'],
            ];
            $advanced_match_object[] = (object) $match;
        }
        $girl_info_object = (object) [
            'rasi' => (object) $girl_details['rasi'],
            'nakshatra' => (object) $girl_details['nakshatra'],
        ];
        $boy_info_object = (object) [
            'rasi' => (object) $boy_details['rasi'],
            'nakshatra' => (object) $boy_details['nakshatra'],
        ];
        $expected_basic_kerala_result = new BasicMatchResult($girl_info, $boy_info, $kerala_result['maximum_points'], $kerala_result['total_points'], $message, $basic_match_result);
        $expected_basic_kerala_result->setRawResponse((object) [
            'girl_info' => $girl_info_object,
            'boy_info' => $boy_info_object,
            'maximum_points' => $kerala_result['maximum_points'],
            'total_points' => $kerala_result['total_points'],
            'message' => (object) $kerala_result['message'],
            'matches' => $basic_match_object,
        ]);

        $this->assertEquals($expected_basic_kerala_result, $basic_kerala_test_result);

        $advanced_kerala_test_result = $porutham->process($girl_profile, $boy_profile, 'kerala', true);
        $expected_advanced_kerala_result = new AdvancedMatchResult($girl_info, $boy_info, $kerala_result['maximum_points'], $kerala_result['total_points'], $message, $advanced_match_result);
        $expected_advanced_kerala_result->setRawResponse((object) [
            'girl_info' => $girl_info_object,
            'boy_info' => $boy_info_object,
            'maximum_points' => $kerala_result['maximum_points'],
            'total_points' => $kerala_result['total_points'],
            'message' => (object) $kerala_result['message'],
            'matches' => $advanced_match_object,
        ]);

        $this->assertEquals($expected_advanced_kerala_result, $advanced_kerala_test_result);

        $tamil_result = self::EXPECTED_RESULT['tamil'];

        $advanced_tamil_match_result = $advanced_tamil_match_object = $basic_tamil_match_result = $basic_tamil_match_object = [];

        foreach ($tamil_result['matches'] as $match) {
            $advanced_tamil_match_result[] = new AdvancedMatch($match['id'], $match['name'], $match['has_porutham'], $match['points'], $match['description'], $match['porutham_status']);
            $basic_tamil_match_result[] = new BasicMatch($match['id'], $match['name'], $match['has_porutham']);
            $basic_tamil_match_object[] = (object) [
                'id' => $match['id'],
                'name' => $match['name'],
                'has_porutham' => $match['has_porutham'],
            ];
            $advanced_tamil_match_object[] = (object) $match;
        }
        $message = new Message($tamil_result['message']['type'], $tamil_result['message']['description']);
        $expected_basic_tamil_result = new BasicMatchResult($girl_info, $boy_info, $tamil_result['maximum_points'], $tamil_result['total_points'], $message, $basic_tamil_match_result);
        $expected_basic_tamil_result->setRawResponse((object) [
            'girl_info' => $girl_info_object,
            'boy_info' => $boy_info_object,
            'maximum_points' => $tamil_result['maximum_points'],
            'total_points' => $tamil_result['total_points'],
            'message' => (object) $tamil_result['message'],
            'matches' => $basic_tamil_match_object,
        ]);
        $basic_tamil_test_result = $porutham->process($girl_profile, $boy_profile, 'tamil');
        $this->assertEquals($expected_basic_tamil_result, $basic_tamil_test_result);

        $expected_advanced_tamil_result = new AdvancedMatchResult($girl_info, $boy_info, $tamil_result['maximum_points'], $tamil_result['total_points'], $message, $advanced_tamil_match_result);
        $expected_advanced_tamil_result->setRawResponse((object) [
            'girl_info' => $girl_info_object,
            'boy_info' => $boy_info_object,
            'maximum_points' => $tamil_result['maximum_points'],
            'total_points' => $tamil_result['total_points'],
            'message' => (object) $tamil_result['message'],
            'matches' => $advanced_tamil_match_object,
        ]);
        $advanced_tamil_test_result = $porutham->process($girl_profile, $boy_profile, 'tamil', true);
        $this->assertEquals($expected_advanced_tamil_result, $advanced_tamil_test_result);
    }
}
