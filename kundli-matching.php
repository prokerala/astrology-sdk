<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Service\KundliMatching;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/**
 * Nakshatra Porutham.
 */

$girl_input = [
    'datetime' => '1967-08-29T09:00:00+05:30',
    'latitude' => '19.0821978',
    'longitude' => '72.7411014', // Mumbai
];

$boy_input = [
    'datetime' => '1970-11-10T09:20:00+05:30',
    'latitude' => '22.6757521',
    'longitude' => '88.0495418', // Kolkata
];

$girl_location = new Location($girl_input['latitude'], $girl_input['longitude']);
$girl_dob = new DateTime($girl_input['datetime']);
$girl_profile = new Profile($girl_location, $girl_dob);

$boy_location = new Location($boy_input['latitude'], $boy_input['longitude']);
$boy_dob = new DateTime($boy_input['datetime']);
$boy_profile = new Profile($boy_location, $boy_dob);

$kundli_matching = new KundliMatching($client);

try {
    $kundli_matching->process($girl_profile, $boy_profile, true);
    $result = $kundli_matching->getResult();

    $girl_info = $result->getGirlInfo();
    $boy_info = $result->getBoyInfo();
    $boy_guna = $boy_info->getGuna();
    $girl_guna = $girl_info->getGuna();
    $girl_nakshatra = $girl_info->getNakshatra();
    $boy_nakshatra = $girl_info->getNakshatra();
    $girl_rasi = $girl_info->getRasi();
    $boy_rasi = $boy_info->getRasi();

    $matchResult['boy_info']['guna'] = $boy_guna->getGuna();
    $matchResult['girl_info']['guna'] = $girl_guna->getGuna();

    $matchResult['girl_info']['nakshatra'] = [
        'id' => $girl_nakshatra->getId(),
        'name' => $girl_nakshatra->getName(),
        'lord' => $girl_nakshatra->getLord(),
        'pada' => $girl_nakshatra->getPada(),
    ];

    $matchResult['boy_info']['nakshatra'] = [
        'id' => $boy_nakshatra->getId(),
        'name' => $boy_nakshatra->getName(),
        'lord' => $boy_nakshatra->getLord(),
        'pada' => $boy_nakshatra->getPada(),
    ];

    $matchResult['girl_info']['rasi'] = [
        'id' => $girl_rasi->getId(),
        'name' => $girl_rasi->getName(),
        'lord' => $girl_rasi->getLord(),
        'lord_en' => $girl_rasi->getLordEn(),
    ];

    $matchResult['boy_info']['rasi'] = [
        'id' => $boy_rasi->getId(),
        'name' => $boy_rasi->getName(),
        'lord' => $boy_rasi->getLord(),
        'lord_en' => $boy_rasi->getLordEn(),
    ];

    $message = $result->getMessage();
    $matchResult['message'] = [
        'type' => $message->getType(),
        'description' => $message->getDescription(),
    ];

    $gunaMilan = $result->getGunaMilan();
    $matchResult['gunaMilan'] = [
        'totalPoints' => $gunaMilan->getTotalPoints(),
        'maximumPoints' => $gunaMilan->getMaximumPoints(),
    ];

    $arKoot = $gunaMilan->getKoot();

    foreach ($arKoot as $koot) {
        $matchResult[] = [
            'id' => $koot->getId(),
            'name' => $koot->getName(),
            'maximumPoints' => $koot->getMaximumPoints(),
            'obtainedPoints' => $koot->getObtainedPoints(),
            'description' => $koot->getDescription(),
        ];
    }
    $matchResult['exceptions'] = $result->getExceptions();

    $girl_mangal_dosha_details = $result->getGirlMangalDoshaDetails();
    $boy_mangal_dosha_details = $result->getBoyMangalDoshaDetails();

    $matchResult['girlMangalDoshaDetails'] = [
        'hasMangalDosha' => $girl_mangal_dosha_details->getHasMangalDosha(),
        'hasException' => $girl_mangal_dosha_details->getHasException(),
        'mangalDoshaType' => $girl_mangal_dosha_details->getMangalDoshaType(),
        'description' => $girl_mangal_dosha_details->getDescription(),
    ];

    $matchResult['boyMangalDoshaDetails'] = [
        'hasMangalDosha' => $boy_mangal_dosha_details->getHasMangalDosha(),
        'hasException' => $boy_mangal_dosha_details->getHasException(),
        'mangalDoshaType' => $boy_mangal_dosha_details->getMangalDoshaType(),
        'description' => $boy_mangal_dosha_details->getDescription(),
    ];
    print_r($matchResult); exit;
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $compatibilityResult = [];
    $kundli_matching->process($girl_profile, $boy_profile);
    $result = $kundli_matching->getResult();

    $girl_info = $result->getGirlInfo();
    $boy_info = $result->getBoyInfo();
    $boy_guna = $boy_info->getGuna();
    $girl_guna = $girl_info->getGuna();
    $girl_nakshatra = $girl_info->getNakshatra();
    $boy_nakshatra = $girl_info->getNakshatra();
    $girl_rasi = $girl_info->getRasi();
    $boy_rasi = $boy_info->getRasi();

    $matchResult['boy_info']['guna'] = $boy_guna->getGuna();
    $matchResult['girl_info']['guna'] = $girl_guna->getGuna();

    $matchResult['girl_info']['nakshatra'] = [
        'id' => $girl_nakshatra->getId(),
        'name' => $girl_nakshatra->getName(),
        'lord' => $girl_nakshatra->getLord(),
        'pada' => $girl_nakshatra->getPada(),
    ];

    $matchResult['boy_info']['nakshatra'] = [
        'id' => $boy_nakshatra->getId(),
        'name' => $boy_nakshatra->getName(),
        'lord' => $boy_nakshatra->getLord(),
        'pada' => $boy_nakshatra->getPada(),
    ];

    $matchResult['girl_info']['rasi'] = [
        'id' => $girl_rasi->getId(),
        'name' => $girl_rasi->getName(),
        'lord' => $girl_rasi->getLord(),
        'lord_en' => $girl_rasi->getLordEn(),
    ];

    $matchResult['boy_info']['rasi'] = [
        'id' => $boy_rasi->getId(),
        'name' => $boy_rasi->getName(),
        'lord' => $boy_rasi->getLord(),
        'lord_en' => $boy_rasi->getLordEn(),
    ];

    $message = $result->getMessage();
    $matchResult['message'] = [
        'type' => $message->getType(),
        'description' => $message->getDescription(),
    ];

    $gunaMilan = $result->getGunaMilan();
    $matchResult['gunaMilan'] = [
        'totalPoints' => $gunaMilan->getTotalPoints(),
        'maximumPoints' => $gunaMilan->getMaximumPoints(),
    ];
    print_r($matchResult);

} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
