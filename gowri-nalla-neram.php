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
use Prokerala\Api\Astrology\Service\GowriNallaNeram;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/** @var Client $client */

/**
 * Chandrashtama Periods
 */
$input = [
    'datetime' => '2020-05-12T09:20:00+05:30',
    'latitude' => 22.6757521,
    'longitude' => 88.0495418, // Kolkata
];

try {
    $datetime = new DateTimeImmutable($input['datetime']);
    $tz = $datetime->getTimezone();

    $location = new Location($input['latitude'], $input['longitude'], 0, $tz);

    $method = new GowriNallaNeram($client);
    $result = $method->process($location, $datetime);
    $arData = $result->getMuhurat();

    $gowriNallaNeramResult = [];

    foreach ($arData as $data) {
        $gowriNallaNeramResult[] = [
            'id' => $data->getId(),
            'name' => $data->getName(),
            'type' => $data->getType(),
            'isDay' => (int)$data->getIsDay(),
            'start' => $data->getStart(),
            'end' => $data->getEnd(),
        ];
    }
    print_r($gowriNallaNeramResult);
} catch (QuotaExceededException|RateLimitExceededException|Exception $e) {
}
