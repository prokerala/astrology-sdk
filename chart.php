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
    $method = new \Prokerala\Api\Astrology\Service\Chart($client);
    $method->process($location, $datetime, 'rasi');
    $result = $method->getResult();
    //print_r($result); exit;
    $chartResult = [];
    $chartResult['chartType'] = $result->getChartType();
    $chartResult['chartName'] = $result->getChartName();
    $chartResult['chartShortName'] = $result->getChartShortName();
    $chartRasi = $result->getChartRasi();
    $chartPosition = [];
    foreach ($chartRasi as $idx => $rasi) {
        $chartPosition[$idx] = [
            'id' => $rasi->getId(),
            'name' => $rasi->getName(),
        ];
        $planetPosition = $rasi->getPlanetPosition();
        $chartPosition[$idx]['planetPosition'] = [];
        if ($planetPosition) {
            foreach ($planetPosition as $id => $position) {
                $chartPosition[$idx]['planetPosition'][] = [
                    'id' => $position->getId(),
                    'name' => $position->getName(),
                    'longitude' => $position->getLongitude(),
                    'isReverse' => $position->getIsReverse(),
                    'position' => $position->getPosition(),
                    'degree' => $position->getPosition(),
                    'rasi' => $position->getRasi(),
                    'rasiLord' => $position->getRasiLord(),
                    'rasiLordEn' => $position->getRasiLordEn(),
                ];
            }
        }
    }
    $chartResult['chartRasi'] = $chartPosition;
    print_r($chartResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
