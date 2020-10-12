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
use Prokerala\Api\Astrology\Service\InauspiciousPeriod;
use Prokerala\Common\Api\Client;

include 'prepend.inc.php';

/**
 * InauspiciousPeriod.
 */
$input = [
    'datetime' => '1967-08-29T09:00:00+05:30',
    'latitude' => '19.0821978',
    'longitude' => '72.7411014', // Mumbai
];

$datetime = new DateTime($input['datetime']);
$tz = $datetime->getTimezone();

$location = new Location($input['latitude'], $input['longitude'], 0, $tz);

try {
    $method = new InauspiciousPeriod($client);
    $method->process($location, $datetime);
    $result = $method->getResult();

    $inauspiciousPeriod = [];

    $arData = $result->getData();

    foreach ($arData as $idx => $data) {
        $inauspiciousPeriod[$idx] = [
            'id' => $data->getId(),
            'name' => $data->getName(),
            'type' => $data->getType(),
        ];
        $arPeriod = $data->getPeriod();
        foreach ($arPeriod as $period) {
            $inauspiciousPeriod[$idx]['period'][] = [
                'start' => $period->getStart(),
                'end' => $period->getEnd(),
            ];
        }
    }
    print_r($inauspiciousPeriod);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
