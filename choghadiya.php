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
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

$client = new Client($apiKey);

/**
 * Choghadiya.
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
    $method = new Choghadiya($client);
    $method->process($location, $datetime);
    $result = $method->getResult();

    $choghadiyaResult = [];

    $choghadiyas['day'] = $result->getDay();
    $choghadiyas['night'] = $result->getNight();

    $fields = ['id', 'name', 'type', 'vela', 'start', 'end'];

    foreach ($choghadiyas as $key => $choghadiya) {
        foreach ($choghadiya as $idx => $choghadiyaData) {
            foreach ($fields as $value) {
                $functionName = 'get'.ucwords($value);
                $choghadiyaResult[$key][$idx][$value] = $choghadiyaData->{$functionName}();
            }
        }
    }

    print_r($choghadiyaResult);
    exit;
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
