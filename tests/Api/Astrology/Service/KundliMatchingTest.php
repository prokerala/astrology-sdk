<?php

namespace Prokerala\Tests\Api\Astrology\Service;

use DateTime;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Result\Element\Planet;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\MangalDosha;
use Prokerala\Api\Astrology\Service\KundliMatching;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\AdvancedKundliMatching as AdvancedMatchResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\KundliMatching as BasicMatchResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\ProfileInfo;
use Prokerala\Api\Astrology\Result\Horoscope\Koot;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Message;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaKoot;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaMilan;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\AdvancedGunaMilan;
use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Rasi;

class KundliMatchingTest extends BaseTestCase
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
        "girl_info" => [
            "koot" => [
                "varna" => "Vaishya",
                "vasya" => "Chatushpada",
                "tara" => "Pratyaka",
                "yoni" => "Sarpa",
                "graha_maitri" => "Venus",
                "gana" => "Manushya",
                "bhakoot" => "Vrishabha",
                "nadi" => "Antya"
            ],
            "nakshatra" => [
                "id" => 3,
                "name" => "Rohini",
                "lord" => [
                    "id" => 1,
                    "name" => "Moon",
                    "vedic_name" => "Chandra"
                ],
                "pada" => 4
            ],
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
        "boy_info" => [
            "koot" => [
                "varna" => "Brahmin",
                "vasya" => "Jalachara",
                "tara" => "Sadhana",
                "yoni" => "Gau",
                "graha_maitri" => "Jupiter",
                "gana" => "Manushya",
                "bhakoot" => "Meena",
                "nadi" => "Madhya"
            ],
            "nakshatra" => [
                "id" => 25,
                "name" => "Uttara Bhadrapada",
                "lord" => [
                    "id" => 6,
                    "name" => "Saturn",
                    "vedic_name" => "Shani"
                ],
                "pada" => 3
            ],
            "rasi" => [
                "id" => 11,
                "name" => "Meena",
                "lord" => [
                    "id" => 2,
                    "name" => "Mercury",
                    "vedic_name" => "Budha"
                ]
            ]
        ],
        "message" => [
            "type" => "good",
            "description" => "Union is Very Good. There is a slight difference in the Mangal Dosha compatibility of both the horoscopes. Please consult an astrologer before proceeding to marriage."
        ],
        "guna_milan" => [
            "total_points" => 26.0,
            "maximum_points" => 36.0,
            "guna" => [
                [
                    "id" => 1,
                    "name" => "Varna",
                    "girl_koot" => "Vaishya",
                    "boy_koot" => "Brahmin",
                    "maximum_points" => 1.0,
                    "obtained_points" => 1.0,
                    "description" => "Varna represents the working attitude and capacity.  The  bridegroom's capacity needs to be higher than that of the bride for smooth running of the family. The boy's varna is Brahmin Varna while the girl comes under Vaishya Varna. This type of combination is very much favorable for a union. For this couple Varna Koot is Good."
                ],
                [
                    "id" => 2,
                    "name" => "Vasya",
                    "girl_koot" => "Chatushpada",
                    "boy_koot" => "Jalachara",
                    "maximum_points" => 2.0,
                    "obtained_points" => 1.0,
                    "description" => "Vasya was used to determine whether there will be a dedicated and compatible relationship between two people. The boy's Vasya is Jalachara Vasya while the girl comes under Chatushpada Vasya. This is a normal match and not excellent or worst. For this couple Vasya Koot is Normal. However, if other gunas are matched well, then this alliance may be taken into consideration."
                ],
                [
                    "id" => 3,
                    "name" => "Tara",
                    "girl_koot" => "Pratyaka",
                    "boy_koot" => "Sadhana",
                    "maximum_points" => 3.0,
                    "obtained_points" => 1.5,
                    "description" => "Tara is used to calculate the health and well-being of the bride and groom after marriage. The boy and girl are in different Tara Group. The boy's nakshatra Uttara Bhadrapada is 5 th position from girl's nakshatra Rohini and this is Malefic. At the same time The girl's nakshatra Rohini is 22 th position from boy's nakshatra Uttara Bhadrapada and this is Benefic. This is a normal match. For this couple Tara Koot is Normal. But if other gunas are matched well, then this alliance may be taken into consideration."
                ],
                [
                    "id" => 4,
                    "name" => "Yoni",
                    "girl_koot" => "Sarpa",
                    "boy_koot" => "Gau",
                    "maximum_points" => 4.0,
                    "obtained_points" => 1.0,
                    "description" => "Yoni indicates the physical and sexual compatibility between a couple. The boy's Yoni is Gau while the girl comes under Sarpa Yoni. This is a worst combination. For this couple Yoni Koot is Not So Good."
                ],
                [
                    "id" => 5,
                    "name" => "Graha Maitri",
                    "girl_koot" => "Venus",
                    "boy_koot" => "Jupiter",
                    "maximum_points" => 5.0,
                    "obtained_points" => 0.5,
                    "description" => "Graha Maitri is used to examine the strength of the love between the couple. This is achieved by comparing the sign lords of the moon in the chart of the bride and groom. The boy's Rasi Lord is Jupiter while the girl's Rasi Lord is Venus. The boy's Rasi is Meena while the girl's Rasi is Vrishabha. This is a worst combination. For this couple Graha Maitri Koot is Not So Good."
                ],
                [
                    "id" => 6,
                    "name" => "Gana",
                    "girl_koot" => "Manushya",
                    "boy_koot" => "Manushya",
                    "maximum_points" => 6.0,
                    "obtained_points" => 6.0,
                    "description" => "Gana is used to identify an individuals temperament. The boy and the girl both belong to same Gana Manushya. This is considered to be an excellent combination for gana match. For this couple Gana Koot is Excellent."
                ],
                [
                    "id" => 7,
                    "name" => "Bhakoot",
                    "girl_koot" => "Vrishabha",
                    "boy_koot" => "Meena",
                    "maximum_points" => 7.0,
                    "obtained_points" => 7.0,
                    "description" => "Bhakoot or Rashikoot testing is used to verify the overall health, welfare and prosperity of a family after marriage. It is believed that Bhakoot Dosha can affect the intimacy between the couple and cause delays in pregnancy. The boy's Zodiac sign is Meena while the girl's Zodiac sign is Vrishabha. This is an excellent combination from the happiness and prosperity point of view. For this couple Bhakoot Koot is Excellent."
                ],
                [
                    "id" => 8,
                    "name" => "Nadi",
                    "girl_koot" => "Antya",
                    "boy_koot" => "Madhya",
                    "maximum_points" => 8.0,
                    "obtained_points" => 8.0,
                    "description" => "Nadi testing is to check the genetic compatibility of the bride and groom to ensure they are capable of producing healthy children. Nadi Koot is given supreme priority during match making. The boy belongs to Madhya Nadi while the while the girl comes under Antya Nadi. This is considered to be extremely good combination according to nadi compatibility. For this couple Nadi Koot is Excellent."
                ]
            ]
        ],
        "girl_mangal_dosha_details" => [
            "has_dosha" => true,
            "has_exception" => true,
            "dosha_type" => "Mild",
            "description" => "The person is Manglik. Mars is positioned in the 2nd house, it is mild Manglik Dosha"
        ],
        "boy_mangal_dosha_details" => [
            "has_dosha" => false,
            "has_exception" => false,
            "dosha_type" => null,
            "description" => "The person is Not Manglik"
        ],
        "exceptions" => []
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

        $kundali_matching = new KundliMatching($client);
        $basic_test_result = $kundali_matching->process($girl_profile, $boy_profile);

        $result = self::EXPECTED_RESULT;

        $boy_info = $result['boy_info'];
        $girl_info = $result['girl_info'];

        $boy_koot = new Koot(
            $boy_info['koot']['varna'],
            $boy_info['koot']['vasya'],
            $boy_info['koot']['tara'],
            $boy_info['koot']['yoni'],
            $boy_info['koot']['graha_maitri'],
            $boy_info['koot']['gana'],
            $boy_info['koot']['bhakoot'],
            $boy_info['koot']['nadi']
        );

        $boy_nakshatra_lord = new Planet($boy_info['nakshatra']['lord']['id'], $boy_info['nakshatra']['lord']['name'], $boy_info['nakshatra']['lord']['vedic_name']);
        $boy_nakshatra = new Nakshatra($boy_info['nakshatra']['id'], $boy_info['nakshatra']['name'], $boy_nakshatra_lord, $boy_info['nakshatra']['pada']);

        $boy_rasi_lord = new Planet($boy_info['rasi']['lord']['id'], $boy_info['rasi']['lord']['name'], $boy_info['rasi']['lord']['vedic_name']);
        $boy_rasi = new Rasi($boy_info['rasi']['id'], $boy_info['rasi']['name'], $boy_rasi_lord);

        $boy_info_object = (object)[
            'koot' => (object)$boy_info['koot'],
            'nakshatra' => (object)$boy_info['nakshatra'],
            'rasi' => (object)$boy_info['rasi']
        ];
        $boy_info_object->nakshatra->lord = (object)$boy_info['nakshatra']['lord'];
        $boy_info_object->rasi->lord = (object)$boy_info['rasi']['lord'];
        $boy_info = new ProfileInfo($boy_koot, $boy_nakshatra, $boy_rasi);

        $girl_koot = new Koot(
            $girl_info['koot']['varna'],
            $girl_info['koot']['vasya'],
            $girl_info['koot']['tara'],
            $girl_info['koot']['yoni'],
            $girl_info['koot']['graha_maitri'],
            $girl_info['koot']['gana'],
            $girl_info['koot']['bhakoot'],
            $girl_info['koot']['nadi']
        );

        $girl_nakshatra_lord = new Planet($girl_info['nakshatra']['lord']['id'], $girl_info['nakshatra']['lord']['name'], $girl_info['nakshatra']['lord']['vedic_name']);
        $girl_nakshatra = new Nakshatra($girl_info['nakshatra']['id'], $girl_info['nakshatra']['name'], $girl_nakshatra_lord, $girl_info['nakshatra']['pada']);

        $girl_rasi_lord = new Planet($girl_info['rasi']['lord']['id'], $girl_info['rasi']['lord']['name'], $girl_info['rasi']['lord']['vedic_name']);
        $girl_rasi = new Rasi($girl_info['rasi']['id'], $girl_info['rasi']['name'], $girl_rasi_lord);

        $girl_info_object = (object)[
            'koot' => (object)$girl_info['koot'],
            'nakshatra' => (object)$girl_info['nakshatra'],
            'rasi' => (object)$girl_info['rasi']
        ];
        $girl_info_object->nakshatra->lord = (object)$girl_info['nakshatra']['lord'];
        $girl_info_object->rasi->lord = (object)$girl_info['rasi']['lord'];
        $girl_info = new ProfileInfo($girl_koot, $girl_nakshatra, $girl_rasi);

        $message = new Message($result['message']['type'], $result['message']['description']);

        $guna_milan = new GunaMilan($result['guna_milan']['total_points'], $result['guna_milan']['maximum_points']);

        $expected_basic_result = new BasicMatchResult($girl_info, $boy_info, $message, $guna_milan);
        $expected_basic_result->setRawResponse((object)[
            'girl_info' => $girl_info_object,
            'boy_info' => $boy_info_object,
            'message' => (object)$result['message'],
            'guna_milan' => (object)[
                'total_points' => $result['guna_milan']['total_points'],
                'maximum_points' => $result['guna_milan']['maximum_points'],
            ],
        ]);

        $this->assertEquals($expected_basic_result, $basic_test_result);

        $advanced_test_result = $kundali_matching->process($girl_profile, $boy_profile, true);
        $guna_result = $guna_object = [];
        foreach ($result['guna_milan']['guna'] as $guna) {
            $guna_result[] = new GunaKoot($guna['id'], $guna['name'], $guna['girl_koot'], $guna['boy_koot'], $guna['maximum_points'], $guna['obtained_points'], $guna['description']);
            $guna_object[] = (object)$guna;
        }
        $advanced_gunamilan_result = new AdvancedGunaMilan($result['guna_milan']['total_points'], $result['guna_milan']['maximum_points'], $guna_result);

        $girl_mangal_dosha_details = new MangalDosha(
            $result['girl_mangal_dosha_details']['has_dosha'],
            $result['girl_mangal_dosha_details']['has_exception'],
            $result['girl_mangal_dosha_details']['dosha_type'],
            $result['girl_mangal_dosha_details']['description']
        );

        $boy_mangal_dosha_details = new MangalDosha(
            $result['boy_mangal_dosha_details']['has_dosha'],
            $result['boy_mangal_dosha_details']['has_exception'],
            $result['boy_mangal_dosha_details']['dosha_type'],
            $result['boy_mangal_dosha_details']['description']
        );

        $expected_advanced_result = new AdvancedMatchResult($girl_info, $boy_info, $message, $advanced_gunamilan_result, $girl_mangal_dosha_details, $boy_mangal_dosha_details, $result['exceptions']);
        $expected_advanced_result->setRawResponse((object)[
            'girl_info' => $girl_info_object,
            'boy_info' => $boy_info_object,
            'message' => (object)$result['message'],
            'guna_milan' => (object)[
                'total_points' => $result['guna_milan']['total_points'],
                'maximum_points' => $result['guna_milan']['maximum_points'],
                'guna' => $guna_object,
            ],
            'girl_mangal_dosha_details' => (object)$result['girl_mangal_dosha_details'],
            'boy_mangal_dosha_details' => (object)$result['boy_mangal_dosha_details'],
            'exceptions' => $result['exceptions']
        ]);

        $this->assertEquals($expected_advanced_result, $advanced_test_result);


    }

}
