<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Prokerala\Api\Astrology\NakshatraProfile;
use Prokerala\Api\Astrology\Service\ThirumanaPorutham;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/** @var \Prokerala\Common\Api\Client $client */

/**
 * Thirumana Porutham.
 */
$girl_input = [
    'nakshatra' => 0,
    'nakshatra_pada' => 2,
];

$boy_input = [
    'nakshatra' => 13,
    'nakshatra_pada' => 3,
];

$girl_nakshatra = $girl_input['nakshatra'];
$girl_nakshatra_pada = $girl_input['nakshatra_pada'];
$girl_profile = new NakshatraProfile($girl_nakshatra, $girl_nakshatra_pada);

$boy_nakshatra = $boy_input['nakshatra'];
$boy_nakshatra_pada = $boy_input['nakshatra_pada'];
$boy_profile = new NakshatraProfile($boy_nakshatra, $boy_nakshatra_pada);

$thirumana_porutham = new ThirumanaPorutham($client);

try {
    $result = $thirumana_porutham->process($girl_profile, $boy_profile);
    $compatibilityResult = [];
    $compatibilityResult['maximumPoint'] = $result->getMaximumPoints();
    $compatibilityResult['ObtainedPoint'] = $result->getObtainedPoints();
    $message = $result->getMessage();
    $compatibilityResult['message'] = [
        'type' => $message->getType(),
        'description' => $message->getDescription(),
    ];
    $matches = $result->getMatches();

    foreach ($matches as $match) {
        $compatibilityResult['matches'][] = [
            'id' => $match->getId(),
            'name' => $match->getName(),
            'hasPorutham' => $match->hasPorutham(),
        ];
    }

    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $result = $thirumana_porutham->process($girl_profile, $boy_profile, true);

    $compatibilityResult = [];
    $compatibilityResult['maximumPoint'] = $result->getMaximumPoints();
    $compatibilityResult['ObtainedPoint'] = $result->getObtainedPoints();

    $message = $result->getMessage();
    $compatibilityResult['message'] = [
        'type' => $message->getType(),
        'description' => $message->getDescription(),
    ];
    $matches = $result->getMatches();
    foreach ($matches as $match) {
        $compatibilityResult['matches'][] = [
            'id' => $match->getId(),
            'name' => $match->getName(),
            'hasPorutham' => $match->hasPorutham(),
            'points' => $match->getPoints(),
            'description' => $match->getDescription(),
        ];
    }
    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
