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
use Prokerala\Api\Astrology\Service\Panchang;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/** @var \Prokerala\Common\Api\Client $client */

/**
 * Panchang.
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
    $method = new Panchang($client);
    $result = $method->process($location, $datetime);

    $panchangResult = [
        'vaara' => $result->getVaara(),
        'sunrise' => $result->getSunrise(),
        'sunset' => $result->getSunset(),
        'moonrise' => $result->getMoonrise(),
        'moonset' => $result->getMoonset(),
    ];

    $nakshatras = $result->getNakshatra();
    $tithis = $result->getTithi();
    $karanas = $result->getKarana();
    $yogas = $result->getYoga();

    foreach ($nakshatras as $nakshatra) {
        $panchangResult['nakshatra'][] = [
            'id' => $nakshatra->getId(),
            'name' => $nakshatra->getName(),
            'start' => $nakshatra->getStart(),
            'end' => $nakshatra->getEnd(),
        ];
    }
    foreach ($tithis as $tithi) {
        $panchangResult['tithi'][] = [
            'index' => $tithi->getIndex(),
            'id' => $tithi->getId(),
            'name' => $tithi->getName(),
            'paksha' => $tithi->getPaksha(),
            'start' => $tithi->getStart(),
            'end' => $tithi->getEnd(),
        ];
    }

    foreach ($karanas as $karana) {
        $panchangResult['karana'][] = [
            'index' => $karana->getIndex(),
            'id' => $karana->getId(),
            'name' => $karana->getName(),
            'start' => $karana->getStart(),
            'end' => $karana->getEnd(),
        ];
    }

    foreach ($yogas as $yoga) {
        $panchangResult['yoga'][] = [
            'id' => $yoga->getId(),
            'name' => $yoga->getName(),
            'start' => $yoga->getStart(),
            'end' => $yoga->getEnd(),
        ];
    }
    print_r($panchangResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $method = new Panchang($client);
    $result = $method->process($location, $datetime, true);

    $panchangResult = [
        'vaara' => $result->getVaara(),
        'sunrise' => $result->getSunrise(),
        'sunset' => $result->getSunset(),
        'moonrise' => $result->getMoonrise(),
        'moonset' => $result->getMoonset(),
    ];

    $nakshatras = $result->getNakshatra();
    $tithis = $result->getTithi();
    $karanas = $result->getKarana();
    $yogas = $result->getYoga();

    foreach ($nakshatras as $nakshatra) {
        $panchangResult['nakshatra'][] = [
            'id' => $nakshatra->getId(),
            'name' => $nakshatra->getName(),
            'start' => $nakshatra->getStart(),
            'end' => $nakshatra->getEnd(),
        ];
    }
    foreach ($tithis as $tithi) {
        $panchangResult['tithi'][] = [
            'index' => $tithi->getIndex(),
            'id' => $tithi->getId(),
            'name' => $tithi->getName(),
            'paksha' => $tithi->getPaksha(),
            'start' => $tithi->getStart(),
            'end' => $tithi->getEnd(),
        ];
    }

    foreach ($karanas as $karana) {
        $panchangResult['karana'][] = [
            'index' => $karana->getIndex(),
            'id' => $karana->getId(),
            'name' => $karana->getName(),
            'start' => $karana->getStart(),
            'end' => $karana->getEnd(),
        ];
    }

    foreach ($yogas as $yoga) {
        $panchangResult['yoga'][] = [
            'id' => $yoga->getId(),
            'name' => $yoga->getName(),
            'start' => $yoga->getStart(),
            'end' => $yoga->getEnd(),
        ];
    }
    $auspiciousPeriod = $result->getAuspiciousPeriod();
    $auspiciousPeriodResult = [];
    foreach ($auspiciousPeriod as $idx => $data) {
        $auspiciousPeriodResult[$idx] = [
            'id' => $data->getId(),
            'name' => $data->getName(),
            'type' => $data->getType(),
        ];
        $arPeriod = $data->getPeriod();
        foreach ($arPeriod as $period) {
            $auspiciousPeriodResult[$idx]['period'][] = [
                'start' => $period->getStart(),
                'end' => $period->getEnd(),
            ];
        }
    }

    $panchangResult['auspiciousPeriod'] = $auspiciousPeriodResult;

    $inauspiciousPeriod = $result->getInauspiciousPeriod();
    $inauspiciousPeriodResult = [];
    foreach ($inauspiciousPeriod as $idx => $data) {
        $inauspiciousPeriodResult[$idx] = [
            'id' => $data->getId(),
            'name' => $data->getName(),
            'type' => $data->getType(),
        ];
        $arPeriod = $data->getPeriod();
        foreach ($arPeriod as $period) {
            $inauspiciousPeriodResult[$idx]['period'][] = [
                'start' => $period->getStart(),
                'end' => $period->getEnd(),
            ];
        }
    }

    $panchangResult['inauspiciousPeriod'] = $inauspiciousPeriodResult;

    print_r($panchangResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
