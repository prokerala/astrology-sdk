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
use Prokerala\Api\Astrology\Service\PapaSamyamCheck;
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

$porutham = new PapaSamyamCheck($client);

try {
    $porutham->process($girl_profile, $boy_profile);
    $result = $porutham->getResult();
    $papaSamyamCheckResult = [
        'status' => $result->getStatus(),
        'message' => $result->getMessage(),
    ];

    $girlPapasamyam = $result->getGirlPapasamyam();
    $boyPapasamyam = $result->getBoyPapasamyam();

    $papaSamyamCheckResult['girlPapasamyam']['total_point'] = $girlPapasamyam->getTotalPoint();
    $papaSamyam = $girlPapasamyam->getPapaSamyam();
    $papaPlanets = $papaSamyam->getPapaPlanet();
    foreach ($papaPlanets as $idx => $papaPlanet) {
        $papaSamyamCheckResult['girlPapasamyam']['papaPlanet'][$idx]['name'] = $papaPlanet->getName();
        $planetDoshas = $papaPlanet->getPlanetDosha();
        foreach ($planetDoshas as $planetDosha) {
            $papaSamyamCheckResult['girlPapasamyam']['papaPlanet'][$idx]['planetDosha'][] = [
                'id' => $planetDosha->getId(),
                'name' => $planetDosha->getName(),
                'position' => $planetDosha->getPosition(),
                'hasDosha' => $planetDosha->getHasDosha(),
            ];
        }
    }

    $papaSamyamCheckResult['boyPapasamyam']['total_point'] = $boyPapasamyam->getTotalPoint();
    $papaSamyam = $boyPapasamyam->getPapaSamyam();
    $papaPlanets = $papaSamyam->getPapaPlanet();
    foreach ($papaPlanets as $idx => $papaPlanet) {
        $papaSamyamCheckResult['boyPapasamyam']['papaPlanet'][$idx]['name'] = $papaPlanet->getName();
        $planetDoshas = $papaPlanet->getPlanetDosha();
        foreach ($planetDoshas as $planetDosha) {
            $papaSamyamCheckResult['boyPapasamyam']['papaPlanet'][$idx]['planetDosha'][] = [
                'id' => $planetDosha->getId(),
                'name' => $planetDosha->getName(),
                'position' => $planetDosha->getPosition(),
                'hasDosha' => $planetDosha->getHasDosha(),
            ];
        }
    }
    print_r($papaSamyamCheckResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
