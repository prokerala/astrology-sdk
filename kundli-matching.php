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
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/** @var \Prokerala\Common\Api\Client $client */

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
$girl_dob = new DateTimeImmutable($girl_input['datetime']);
$girl_profile = new Profile($girl_location, $girl_dob);

$boy_location = new Location($boy_input['latitude'], $boy_input['longitude']);
$boy_dob = new DateTimeImmutable($boy_input['datetime']);
$boy_profile = new Profile($boy_location, $boy_dob);

$kundli_matching = new KundliMatching($client);

try {
    $matchResult = [];
    $result = $kundli_matching->process($girl_profile, $boy_profile, true);
    $girl_info = $result->getGirlInfo();
    $boy_info = $result->getBoyInfo();
    $boy_koot = $boy_info->getKoot();
    $girl_koot = $girl_info->getKoot();

    $girl_nakshatra = $girl_info->getNakshatra();
    $boy_nakshatra = $girl_info->getNakshatra();
    $girl_nakshatra_lord = $girl_nakshatra->getLord();
    $boy_nakshatra_lord = $boy_nakshatra->getLord();

    $girl_rasi = $girl_info->getRasi();
    $boy_rasi = $boy_info->getRasi();
    $girl_rasi_lord = $girl_rasi->getLord();
    $boy_rasi_lord = $boy_rasi->getLord();

    $matchResult['boy_info']['koot'] = $boy_koot->getKoot();
    $matchResult['girl_info']['koot'] = $girl_koot->getKoot();

    $matchResult['girl_info']['nakshatra'] = [
        'id' => $girl_nakshatra->getId(),
        'name' => $girl_nakshatra->getName(),
        'pada' => $girl_nakshatra->getPada(),
        'lord' => [
            'id' => $girl_nakshatra_lord->getId(),
            'name' => $girl_nakshatra_lord->getName(),
            'vedicName' => $girl_nakshatra_lord->getVedicName(),
        ],
    ];

    $matchResult['boy_info']['nakshatra'] = [
        'id' => $boy_nakshatra->getId(),
        'name' => $boy_nakshatra->getName(),
        'pada' => $boy_nakshatra->getPada(),
        'lord' => [
            'id' => $boy_nakshatra_lord->getId(),
            'name' => $boy_nakshatra_lord->getName(),
            'vedicName' => $boy_nakshatra_lord->getVedicName(),
        ],
    ];

    $matchResult['girl_info']['rasi'] = [
        'id' => $girl_rasi->getId(),
        'name' => $girl_rasi->getName(),
        'lord' => [
            'id' => $girl_rasi_lord->getId(),
            'name' => $girl_rasi_lord->getName(),
            'vedicName' => $girl_rasi_lord->getVedicName(),
        ],
    ];

    $matchResult['boy_info']['rasi'] = [
        'id' => $boy_rasi->getId(),
        'name' => $boy_rasi->getName(),
        'lord' => [
            'id' => $boy_rasi_lord->getId(),
            'name' => $boy_rasi_lord->getName(),
            'vedicName' => $boy_rasi_lord->getVedicName(),
        ],
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

    $arGuna = $gunaMilan->getGuna();

    foreach ($arGuna as $guna) {
        $matchResult[] = [
            'id' => $guna->getId(),
            'name' => $guna->getName(),
            'maximumPoints' => $guna->getMaximumPoints(),
            'obtainedPoints' => $guna->getObtainedPoints(),
            'description' => $guna->getDescription(),
        ];
    }
    $matchResult['exceptions'] = $result->getExceptions();

    $girl_mangal_dosha_details = $result->getGirlMangalDoshaDetails();
    $boy_mangal_dosha_details = $result->getBoyMangalDoshaDetails();

    $matchResult['girlMangalDoshaDetails'] = [
        'hasMangalDosha' => $girl_mangal_dosha_details->hasDosha(),
        'hasException' => $girl_mangal_dosha_details->hasException(),
        'mangalDoshaType' => $girl_mangal_dosha_details->getDoshaType(),
        'description' => $girl_mangal_dosha_details->getDescription(),
    ];

    $matchResult['boyMangalDoshaDetails'] = [
        'hasMangalDosha' => $boy_mangal_dosha_details->hasDosha(),
        'hasException' => $boy_mangal_dosha_details->hasException(),
        'mangalDoshaType' => $boy_mangal_dosha_details->getDoshaType(),
        'description' => $boy_mangal_dosha_details->getDescription(),
    ];
    print_r($matchResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $matchResult = [];
    $result = $kundli_matching->process($girl_profile, $boy_profile);
    $girl_info = $result->getGirlInfo();
    $boy_info = $result->getBoyInfo();
    $boy_koot = $boy_info->getKoot();
    $girl_koot = $girl_info->getKoot();

    $girl_nakshatra = $girl_info->getNakshatra();
    $boy_nakshatra = $girl_info->getNakshatra();
    $girl_nakshatra_lord = $girl_nakshatra->getLord();
    $boy_nakshatra_lord = $boy_nakshatra->getLord();

    $girl_rasi = $girl_info->getRasi();
    $boy_rasi = $boy_info->getRasi();
    $girl_rasi_lord = $girl_rasi->getLord();
    $boy_rasi_lord = $boy_rasi->getLord();

    $matchResult['boy_info']['koot'] = $boy_koot->getKoot();
    $matchResult['girl_info']['koot'] = $girl_koot->getKoot();

    $matchResult['girl_info']['nakshatra'] = [
        'id' => $girl_nakshatra->getId(),
        'name' => $girl_nakshatra->getName(),
        'pada' => $girl_nakshatra->getPada(),
        'lord' => [
            'id' => $girl_nakshatra_lord->getId(),
            'name' => $girl_nakshatra_lord->getName(),
            'vedicName' => $girl_nakshatra_lord->getVedicName(),
        ],
    ];

    $matchResult['boy_info']['nakshatra'] = [
        'id' => $boy_nakshatra->getId(),
        'name' => $boy_nakshatra->getName(),
        'pada' => $boy_nakshatra->getPada(),
        'lord' => [
            'id' => $boy_nakshatra_lord->getId(),
            'name' => $boy_nakshatra_lord->getName(),
            'vedicName' => $boy_nakshatra_lord->getVedicName(),
        ],
    ];

    $matchResult['girl_info']['rasi'] = [
        'id' => $girl_rasi->getId(),
        'name' => $girl_rasi->getName(),
        'lord' => [
            'id' => $girl_rasi_lord->getId(),
            'name' => $girl_rasi_lord->getName(),
            'vedicName' => $girl_rasi_lord->getVedicName(),
        ],
    ];

    $matchResult['boy_info']['rasi'] = [
        'id' => $boy_rasi->getId(),
        'name' => $boy_rasi->getName(),
        'lord' => [
            'id' => $boy_rasi_lord->getId(),
            'name' => $boy_rasi_lord->getName(),
            'vedicName' => $boy_rasi_lord->getVedicName(),
        ],
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
