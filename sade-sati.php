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
use Prokerala\Api\Astrology\Service\SadeSati;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/**
 * Sade Sati.
 */
$client = new Client($apiKey);

$latitude = 10.214747;
$longitude = 78.097626;

$datetime_string = '2004-02-01T15:19:21+05:30'; //input time in user timezone
$datetime = new DateTime($datetime_string);

$client = new Client($apiKey);

$location = new Location($latitude, $longitude, 0, new DateTimeZone('Asia/Kolkata'));

$sade_sati = new SadeSati($client);

try {
    $sade_sati->process($location, $datetime);
    $result = $sade_sati->getResult();
    $sadeSatiResult = [
        'isInSadeSati' => $result->getIsInSadeSati(),
        'transitPhase' => $result->getTransitPhase(),
        'description' => $result->getDescription(),
    ];
    print_r($sadeSatiResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $sade_sati->process($location, $datetime, true);
    $result = $sade_sati->getResult();
    $sadeSatiResult = [
        'isInSadeSati' => $result->getIsInSadeSati(),
        'transitPhase' => $result->getTransitPhase(),
        'description' => $result->getDescription(),
    ];
    $arTransit = $result->getTransits();
    foreach ($arTransit as $transit) {
        $sadeSatiResult['transits'][] = [
            'phase' => $transit->getPhase(),
            'start' => $transit->getStart(),
            'end' => $transit->getEnd(),
        ];
    }
    print_r($sadeSatiResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
