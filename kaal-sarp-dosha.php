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
    $method = new \Prokerala\Api\Astrology\Service\KaalSarpDosha($client);
    $result = $method->process($location, $datetime);

    $kaalSarpDoshaResult = [];

    $kaalSarpDoshaResult['kaal_sarp_type'] = $result->getType();
    $kaalSarpDoshaResult['kaal_sarp_dosha_type'] = $result->getDoshaType();
    $kaalSarpDoshaResult['has_kaal_sarp_dosha'] = $result->hasDosha();
    $kaalSarpDoshaResult['description'] = $result->getDescription();

    print_r($kaalSarpDoshaResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
