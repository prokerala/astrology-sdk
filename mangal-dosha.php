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
 * Mangal Dosha.
 */
$input = [
    'datetime' => '1967-08-29T09:00:00+05:30',
    'latitude' => '19.0821978',
    'longitude' => '72.7411014', // Mumbai
];

$datetime = new DateTimeImmutable($input['datetime']);
$tz = $datetime->getTimezone();

$location = new Location($input['latitude'], $input['longitude'], 0, $tz);

try {
    $method = new \Prokerala\Api\Astrology\Service\MangalDosha($client);
    $result = $method->process($location, $datetime);

    $mangalDoshaResult = [];

    $mangalDoshaResult['has_mangal_dosha'] = $result->hasDosha();
    $mangalDoshaResult['description'] = $result->getDescription();

    print_r($mangalDoshaResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $method = new \Prokerala\Api\Astrology\Service\MangalDosha($client);
    $result = $method->process($location, $datetime, true);

    $mangalDoshaResult = [];

    $mangalDoshaResult['has_mangal_dosha'] = $result->hasDosha();
    $mangalDoshaResult['has_exception'] = $result->hasException();
    $mangalDoshaResult['mangal_dosha_type'] = $result->getType();
    $mangalDoshaResult['description'] = $result->getDescription();
    $mangalDoshaResult['exceptions'] = $result->getexceptions();
    $mangalDoshaResult['remedies'] = $result->getRemedies();

    print_r($mangalDoshaResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
