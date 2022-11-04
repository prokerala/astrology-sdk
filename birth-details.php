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
    $method = new \Prokerala\Api\Astrology\Service\BirthDetails($client);
    $result = $method->process($location, $datetime);

    $nakshatra = $result->getNakshatra();
    $sooryaRasi = $result->getSooryaRasi();
    $chandraRasi = $result->getChandraRasi();
    $zodiac = $result->getZodiac();
    $additionalInfo = $result->getAdditionalInfo();

    $nakshatraLord = $nakshatra->getLord();
    $sooryaRasiLord = $sooryaRasi->getLord();
    $chandraRasiLord = $chandraRasi->getLord();

    $birthDetails = [
        'nakshatra' => [
            'id' => $nakshatra->getId(),
            'name' => $nakshatra->getName(),
            'pada' => $nakshatra->getPada(),
            'lord' => [
                'id' => $nakshatraLord->getId(),
                'name' => $nakshatraLord->getName(),
                'vedicName' => $nakshatraLord->getVedicName(),
            ],
        ],
        'sooryaRasi' => [
            'id' => $sooryaRasi->getId(),
            'name' => $sooryaRasi->getName(),
            'lord' => [
                'id' => $sooryaRasiLord->getId(),
                'name' => $sooryaRasiLord->getName(),
                'vedicName' => $sooryaRasiLord->getVedicName(),
            ],
        ],
        'chandraRasi' => [
            'id' => $chandraRasi->getId(),
            'name' => $chandraRasi->getName(),
            'lord' => [
                'id' => $chandraRasiLord->getId(),
                'name' => $chandraRasiLord->getName(),
                'vedicName' => $chandraRasiLord->getVedicName(),
            ],
        ],
        'zodiac' => [
            'id' => $zodiac->getId(),
            'name' => $zodiac->getName(),
        ],
        'additionalInfo' => [
            'deity' => $additionalInfo->getDeity(),
            'ganam' => $additionalInfo->getGanam(),
            'symbol' => $additionalInfo->getSymbol(),
            'animalSign' => $additionalInfo->getAnimalsign(),
            'nadi' => $additionalInfo->getNadi(),
            'color' => $additionalInfo->getColor(),
            'bestDirection' => $additionalInfo->getBestdirection(),
            'syllables' => $additionalInfo->getSyllables(),
            'birthStone' => $additionalInfo->getBirthstone(),
            'gender' => $additionalInfo->getGender(),
            'planet' => $additionalInfo->getPlanet(),
            'enemyYoni' => $additionalInfo->getEnemyYoni(),
        ],
    ];

    print_r($birthDetails);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
