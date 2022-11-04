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
    $method = new \Prokerala\Api\Astrology\Service\PlanetPosition($client);
    $result = $method->process($location, $datetime);
    $planetPositions = $result->getPlanetPosition();
    $planetPositionResult = [];
    foreach ($planetPositions as $position) {
        $rasi = $position->getRasi();
        $rasiLord = $rasi->getLord();
        $planetPositionResult[] = [
            'id' => $position->getId(),
            'name' => $position->getName(),
            'longitude' => $position->getLongitude(),
            'isRetrograde' => $position->isRetrograde(),
            'position' => $position->getPosition(),
            'degree' => $position->getDegree(),
            'rasi' => [
                'id' => $rasi->getId(),
                'name' => $rasi->getName(),
                'lord' => [
                    'id' => $rasiLord->getId(),
                    'name' => $rasiLord->getName(),
                    'vedicName' => $rasiLord->getVedicName(),
                ],
            ],
        ];
    }
    print_r($planetPositionResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
