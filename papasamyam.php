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
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/** @var \Prokerala\Common\Api\Client $client */

/**
 * Kaal Sarp Dosha.
 */
$input = [
    'datetime' => '2020-05-12T09:20:00+05:30',
    'latitude' => '22.6757521',
    'longitude' => '88.0495418', // Kolkata
];

$datetime = new DateTimeImmutable($input['datetime']);
$tz = $datetime->getTimezone();

$location = new Location($input['latitude'], $input['longitude'], 0, $tz);

try {
    $method = new \Prokerala\Api\Astrology\Service\Papasamyam($client);
    $result = $method->process($location, $datetime);

    $papasamyamResult['total_point'] = $result->getTotalPoints();
    $papaSamyam = $result->getPapaSamyam();
    $papaPlanets = $papaSamyam->getPapaPlanet();
    foreach ($papaPlanets as $idx => $papaPlanet) {
        $papasamyamResult['papaPlanet'][$idx]['name'] = $papaPlanet->getName();
        $planetDoshas = $papaPlanet->getPlanetDosha();
        foreach ($planetDoshas as $planetDosha) {
            $papasamyamResult['papaPlanet'][$idx]['planetDosha'][] = [
                'id' => $planetDosha->getId(),
                'name' => $planetDosha->getName(),
                'position' => $planetDosha->getPosition(),
                'hasDosha' => $planetDosha->hasDosha(),
            ];
        }
    }
    print_r($papasamyamResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
