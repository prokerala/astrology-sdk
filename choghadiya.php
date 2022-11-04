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
use Prokerala\Api\Astrology\Service\Choghadiya;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/** @var \Prokerala\Common\Api\Client $client */

/**
 * Choghadiya.
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
    $method = new Choghadiya($client);
    $result = $method->process($location, $datetime);

    $arData = $result->getMuhurat();

    $choghadiyaResult = [];

    foreach ($arData as $data) {
        $choghadiyaResult[] = [
            'id' => $data->getId(),
            'name' => $data->getName(),
            'type' => $data->getType(),
            'vela' => $data->getVela(),
            'isDay' => $data->getIsDay(),
            'start' => $data->getStart(),
            'end' => $data->getEnd(),
        ];
    }
    print_r($choghadiyaResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
