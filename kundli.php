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
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

$client = new Client($apiKey);

/**
 * Kaal Sarp Dosha.
 */
$input = [
    'datetime' => '2020-05-12T09:20:00+05:30',
    'latitude' => '22.6757521',
    'longitude' => '88.0495418', // Kolkata
];

$datetime = new DateTime($input['datetime']);
$tz = $datetime->getTimezone();

$location = new Location($input['latitude'], $input['longitude'], 0, $tz);

try {
    $method = new \Prokerala\Api\Astrology\Service\Kundli($client);
    $method->process($location, $datetime);
    $result = $method->getResult();
    $nakshatraDetails = $result->getNakshatraDetails();
    $nakshatraResult = [
        'nakshatraName' => $nakshatraDetails->getNakshatraName(),
        'nakshatraLongitude' => $nakshatraDetails->getNakshatraLongitude(),
        'nakshatraStart' => $nakshatraDetails->getNakshatraStart(),
        'nakshatraEnd' => $nakshatraDetails->getNakshatraEnd(),
        'nakshatraPada' => $nakshatraDetails->getNakshatraPada(),
    ];

    foreach (['chandraRasi', 'sooryaRasi', 'zodiac'] as $item) {
        $fn = 'get'.ucwords($item);
        $itemResult = $nakshatraDetails->{$fn}();
        $nakshatraResult[$item] = [
            'id' => $itemResult->getId(),
            'name' => $itemResult->getName(),
            'longitude' => $itemResult->getLongitude(),
        ];
    }
    $additionalInfo = $nakshatraDetails->getAdditionalInfo();
    foreach (['diety', 'ganam', 'symbol', 'animalSign', 'nadi', 'color', 'bestDirection', 'syllables', 'birthStone', 'gender', 'planet', 'enemyYoni'] as $info) {
        $fn = 'get'.ucwords($info);
        $nakshatraResult['additionalInfo'][$info] = $additionalInfo->{$fn}();
    }

    $mangalDoshaResult = [];
    $mangalDoshaDetails = $result->getMangalDosha();
    $mangalDoshaResult['has_mangal_dosha'] = $mangalDoshaDetails->getHasMangalDosha();
    $mangalDoshaResult['description'] = $mangalDoshaDetails->getDescription();

    $yogaDetails = $result->getYogas();
    $yogaResult = [];
    foreach (['majorYogas', 'chandrayogas', 'sooryaYogas', 'inauspiciousYogas'] as $yoga) {
        $fn = 'get'.ucwords($yoga);
        $yogaResult[$yoga] = $yogaDetails->{$fn}();
    }

    $kundliResult = [
        'nakshatraDetails' => $nakshatraResult,
        'mangalDosha' => $mangalDoshaResult,
        'yogas' => $yogaResult,
    ];
    print_r($kundliResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $method = new \Prokerala\Api\Astrology\Service\Kundli($client);
    $method->process($location, $datetime, true);
    $result = $method->getResult();
    $nakshatraDetails = $result->getNakshatraDetails();
    $nakshatraResult = [
        'nakshatraName' => $nakshatraDetails->getNakshatraName(),
        'nakshatraLongitude' => $nakshatraDetails->getNakshatraLongitude(),
        'nakshatraStart' => $nakshatraDetails->getNakshatraStart(),
        'nakshatraEnd' => $nakshatraDetails->getNakshatraEnd(),
        'nakshatraPada' => $nakshatraDetails->getNakshatraPada(),
    ];

    foreach (['chandraRasi', 'sooryaRasi', 'zodiac'] as $item) {
        $fn = 'get'.ucwords($item);
        $itemResult = $nakshatraDetails->{$fn}();
        $nakshatraResult[$item] = [
            'id' => $itemResult->getId(),
            'name' => $itemResult->getName(),
            'longitude' => $itemResult->getLongitude(),
        ];
    }
    $additionalInfo = $nakshatraDetails->getAdditionalInfo();
    foreach (['diety', 'ganam', 'symbol', 'animalSign', 'nadi', 'color', 'bestDirection', 'syllables', 'birthStone', 'gender', 'planet', 'enemyYoni'] as $info) {
        $fn = 'get'.ucwords($info);
        $nakshatraResult['additionalInfo'][$info] = $additionalInfo->{$fn}();
    }

    $mangalDoshaResult = [];
    $mangalDoshaDetails = $result->getMangalDosha();

    $mangalDoshaResult['has_mangal_dosha'] = $mangalDoshaDetails->getHasMangalDosha();
    $mangalDoshaResult['has_exception'] = $mangalDoshaDetails->getHasException();
    $mangalDoshaResult['mangal_dosha_type'] = $mangalDoshaDetails->getMangalDoshaType();
    $mangalDoshaResult['description'] = $mangalDoshaDetails->getDescription();
    $mangalDoshaResult['exceptions'] = $mangalDoshaDetails->getexceptions();
    $mangalDoshaResult['remedies'] = $mangalDoshaDetails->getRemedies();

    $yogaDetails = $result->getYogas();
    $yogaResult = [];
    foreach (['majorYogas', 'chandrayogas', 'sooryaYogas', 'inauspiciousYogas'] as $yoga) {
        $fn = 'get'.ucwords($yoga);
        $yogaResult[$yoga] = $yogaDetails->{$fn}();
    }

    $dashaPeriods = $result->getDashaPeriods();
    $dashaPeriodResult = [];
    foreach ($dashaPeriods as $idx => $period) {
        $dashaPeriodResult[$idx]['dashaName'] = $period->getDashaName();
        $dasha_period = $period->getDashaPeriod();
        $mahadasha = $dasha_period->getMahadasha();
        $anthardasha = $dasha_period->getAnthardasha();
        $pratyantardasha = $dasha_period->getPratyantardasha();
        $dashaPeriodResult[$idx]['dashaPeriod']['mahadasha'] = [
            'name' => $mahadasha->getName(),
            'start' => $mahadasha->getStart(),
            'end' => $mahadasha->getEnd(),
        ];

        foreach ($anthardasha as $dasha) {
            $dashaPeriodResult[$idx]['dashaPeriod']['anthardasha'][] = [
                'name' => $dasha->getName(),
                'start' => $dasha->getStart(),
                'end' => $dasha->getEnd(),
            ];
        }
        $pDashaResult = $pFinal = [];
        foreach ($pratyantardasha as $key => $dashaResult) {
            $pDashaResult[$key]['name'] = $dashaResult->getName();
            $pratyantardashaPeriod = $dashaResult->getPeriod();
            $pPeriods = [];
            foreach ($pratyantardashaPeriod as $dashaPeriod) {
                $pPeriods[] = [
                    'name' => $dashaPeriod->getName(),
                    'start' => $dashaPeriod->getStart(),
                    'end' => $dashaPeriod->getEnd(),
                ];
            }
            $pDashaResult[$key]['period'] = $pPeriods;
            $dashaPeriodResult[$idx]['dashaPeriod']['pratyantardasha'][] = $pPeriods;
        }
    }

    $kundliResult = [
        'nakshatraDetails' => $nakshatraResult,
        'mangalDosha' => $mangalDoshaResult,
        'yogas' => $yogaResult,
        'dashaPeriods' => $dashaPeriodResult,
    ];

    print_r($kundliResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
