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
$client = new Client($apiKey);

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
    $girl_nakshatra = $girl_info->getNakshatra();
    $girl_rasi = $girl_info->getRasi();

    $boy_info = $result->getBoyInfo();
    $boy_nakshatra = $boy_info->getNakshatra();
    $boy_rasi = $boy_info->getRasi();

    $compatibilityResult['girlInfo'] = [
        'nakshatra' => [
            'id' => $girl_nakshatra->getId(),
            'name' => $girl_nakshatra->getName(),
            'longitude' => $girl_nakshatra->getLongitude(),
        ],
        'rasi' => [
            'id' => $girl_rasi->getId(),
            'name' => $girl_rasi->getName(),
            'longitude' => $girl_rasi->getLongitude(),
        ],
    ];

    $compatibilityResult['boyInfo'] = [
        'nakshatra' => [
            'id' => $boy_nakshatra->getId(),
            'name' => $boy_nakshatra->getName(),
            'longitude' => $boy_nakshatra->getLongitude(),
        ],
        'rasi' => [
            'id' => $boy_rasi->getId(),
            'name' => $boy_rasi->getName(),
            'longitude' => $boy_rasi->getLongitude(),
        ],
    ];

    $profileInfo = [
        'varna', 'vasya', 'tara', 'yoni', 'grahaMaitri', 'gana', 'bhakoot', 'nadi',
    ];

    foreach (['girlInfo', 'boyInfo'] as $profile) {
        $fn = 'get'.ucwords($profile);
        $profileData = $result->{$fn}();
        foreach ($profileInfo as $info) {
            $fn1 = 'get'.ucwords($info);
            $compatibilityResult[$profile][$info] = $profileData->{$fn1}();
        }
    }
    $message = $result->getMessage();
    $compatibilityResult['message'] = $message->getMessage();
    $compatibilityResult['messageType'] = $message->getMessageType();

    $gunaMilan = $result->getGunaMilan();

    $compatibilityResult['gunaMilan']['totalPoint'] = $gunaMilan->getTotalPoint();
    $compatibilityResult['gunaMilan']['maximumPoint'] = $gunaMilan->getMaximumPoint();

    $arKoot = ['varnaKoot', 'vasyaKoot', 'taraKoot', 'yoniKoot', 'grahaMaitriKoot', 'ganaKoot', 'bhakootKoot', 'nadiKoot'];

    foreach ($arKoot as $koot) {
        $functionName = 'get'.ucwords($koot);
        $poruthamResult = $gunaMilan->{$functionName}();
        foreach (['maximumPoint', 'obtainedPoint', 'message'] as $value) {
            $functionName = 'get'.ucwords($value);
            $compatibilityResult['gunaMilan'][$koot][$value] = $poruthamResult->{$functionName}();
        }
    }

    foreach (['girlMangalDoshaDetails', 'boyMangalDoshaDetails'] as $field) {
        $functionName = 'get'.ucwords($field);
        $mangalDoshaResult = $result->{$functionName}();
        foreach (['hasMangalDosha', 'hasException', 'mangalDoshaType', 'description'] as $value) {
            $functionName = 'get'.ucwords($value);
            $compatibilityResult[$field][$value] = $mangalDoshaResult->{$functionName}();
        }
    }
    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $compatibilityResult = [];
    $kundli_matching->process($girl_profile, $boy_profile);
    $result = $kundli_matching->getResult();

    $girl_info = $result->getGirlInfo();
    $girl_nakshatra = $girl_info->getNakshatra();
    $girl_rasi = $girl_info->getRasi();

    $boy_info = $result->getBoyInfo();
    $boy_nakshatra = $boy_info->getNakshatra();
    $boy_rasi = $boy_info->getRasi();

    $compatibilityResult['girlInfo'] = [
        'nakshatra' => [
            'id' => $girl_nakshatra->getId(),
            'name' => $girl_nakshatra->getName(),
            'longitude' => $girl_nakshatra->getLongitude(),
        ],
        'rasi' => [
            'id' => $girl_rasi->getId(),
            'name' => $girl_rasi->getName(),
            'longitude' => $girl_rasi->getLongitude(),
        ],
    ];

    $compatibilityResult['boyInfo'] = [
        'nakshatra' => [
            'id' => $boy_nakshatra->getId(),
            'name' => $boy_nakshatra->getName(),
            'longitude' => $boy_nakshatra->getLongitude(),
        ],
        'rasi' => [
            'id' => $boy_rasi->getId(),
            'name' => $boy_rasi->getName(),
            'longitude' => $boy_rasi->getLongitude(),
        ],
    ];

    $profileInfo = [
        'varna', 'vasya', 'tara', 'yoni', 'grahaMaitri', 'gana', 'bhakoot', 'nadi',
    ];

    foreach (['girlInfo', 'boyInfo'] as $profile) {
        $fn = 'get'.ucwords($profile);
        $profileData = $result->{$fn}();
        foreach ($profileInfo as $info) {
            $fn1 = 'get'.ucwords($info);
            $compatibilityResult[$profile][$info] = $profileData->{$fn1}();
        }
    }
    $message = $result->getMessage();
    $compatibilityResult['message'] = $message->getMessage();
    $compatibilityResult['messageType'] = $message->getMessageType();

    $gunaMilan = $result->getGunaMilan();

    $compatibilityResult['gunaMilan']['totalPoint'] = $gunaMilan->getTotalPoint();
    $compatibilityResult['gunaMilan']['maximumPoint'] = $gunaMilan->getMaximumPoint();

    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
