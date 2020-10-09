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
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

$client = new Client($apiKey);

/**
 * Kaal Sarp Dosha.
 */
$input = [
    'datetime' => '2020-05-12T09:20:00+05:30',
    'latitude' => '22.6757521',
    'longitude' => '88.0495418', // Kolkata
];

$datetime = new DateTime($input['datetime']);
$tz = $datetime->getTimezone();

$location = new Location($input['latitude'], $input['longitude'], 0, $tz);

try {
    $method = new \Prokerala\Api\Astrology\Service\Nakshatra($client);
    $method->process($location, $datetime);
    $result = $method->getResult();

    $nakshatraResult = [
        'nakshatraName' => $result->getNakshatraName(),
        'nakshatraLongitude' => $result->getNakshatraLongitude(),
        'nakshatraStart' => $result->getNakshatraStart(),
        'nakshatraEnd' => $result->getNakshatraEnd(),
        'nakshatraPada' => $result->getNakshatraPada(),
    ];

    foreach (['chandraRasi', 'sooryaRasi', 'zodiac'] as $item) {
        $fn = 'get'.ucwords($item);
        $itemResult = $result->{$fn}();
        $nakshatraResult[$item] = [
            'id' => $itemResult->getId(),
            'name' => $itemResult->getName(),
            'longitude' => $itemResult->getLongitude(),
        ];
    }
    $additionalInfo = $result->getAdditionalInfo();
    foreach (['diety', 'ganam', 'symbol', 'animalSign', 'nadi', 'color', 'bestDirection', 'syllables', 'birthStone', 'gender', 'planet', 'enemyYoni'] as $info) {
        $fn = 'get'.ucwords($info);
        $nakshatraResult['additionalInfo'][$info] = $additionalInfo->{$fn}();
    }
    print_r($nakshatraResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
