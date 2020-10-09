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
use Prokerala\Common\Api\Client;

include 'prepend.inc.php';

$client = new Client($apiKey);

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
    $method = new \Prokerala\Api\Astrology\Service\InauspiciousPeriod($client);
    $method->process($location, $datetime);
    $result = $method->getResult();

    $inauspiciousPeriod = [];

    $fields = ['rahu_kaal', 'yamaganda_kaal', 'gulika_kaal', 'dur_muhurat', 'varjyam'];

    foreach ($fields as $field) {
        $fieldname = str_replace('_', ' ', $field);
        $functionName = str_replace(' ', '', 'get'.ucwords($fieldname));
        $muhurat = $result->{$functionName}();

        if (is_array($muhurat)) {
            foreach ($muhurat as $data) {
                $inauspiciousPeriod[$field][] =
                    [
                        'start' => $data->getStart(),
                        'end' => $data->getEnd(),
                    ];
            }

            continue;
        }

        $inauspiciousPeriod[$field] = [
            'start' => $muhurat->getStart(),
            'end' => $muhurat->getEnd(),
        ];
    }

    print_r($inauspiciousPeriod);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
