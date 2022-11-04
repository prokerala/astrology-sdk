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
use Prokerala\Api\Astrology\Service\Kundli;
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
    $kundliResult = [];
    $method = new Kundli($client);
    $result = $method->process($location, $datetime);

    $nakshatraDetails = $result->getNakshatraDetails();
    $nakshatra = $nakshatraDetails->getNakshatra();
    $nakshatraLord = $nakshatra->getLord();

    $chandraRasi = $nakshatraDetails->getChandraRasi();
    $chandraRasiLord = $chandraRasi->getLord();

    $sooryaRasi = $nakshatraDetails->getSooryaRasi();
    $sooryaRasiLord = $sooryaRasi->getLord();

    $zodiac = $nakshatraDetails->getZodiac();

    $additionalInfo = $nakshatraDetails->getAdditionalInfo();

    $mangalDosha = $result->getMangalDosha();

    $yogaDetails = $result->getYogaDetails();

    $kundliResult = [
        'nakshatraDetails' => [
            'nakshatra' => [
                'id' => $nakshatra->getId(),
                'name' => $nakshatra->getName(),
                'lord' => [
                    'id' => $nakshatraLord->getId(),
                    'name' => $nakshatraLord->getName(),
                    'vedicName' => $nakshatraLord->getVedicName(),
                ],
                'pada' => $nakshatra->getPada(),
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
            'sooryaRasi' => [
                'id' => $sooryaRasi->getId(),
                'name' => $sooryaRasi->getName(),
                'lord' => [
                    'id' => $sooryaRasiLord->getId(),
                    'name' => $sooryaRasiLord->getName(),
                    'vedicName' => $sooryaRasiLord->getVedicName(),
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
        ],
        'mangalDosha' => [
            'hasDosha' => $mangalDosha->hasDosha(),
            'description' => $mangalDosha->getDescription(),
        ],
    ];

    $yogaDetailResult = [];

    foreach ($yogaDetails as $details) {
        $yogaDetailResult[] = [
            'name' => $details->getName(),
            'description' => $details->getDescription(),
        ];
    }

    $kundliResult['yogaDetails'] = $yogaDetailResult;
    print_r($kundliResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $kundliResult = [];
    $method = new Kundli($client);
    $result = $method->process($location, $datetime, true);
    $nakshatraDetails = $result->getNakshatraDetails();
    $nakshatra = $nakshatraDetails->getNakshatra();
    $nakshatraLord = $nakshatra->getLord();

    $chandraRasi = $nakshatraDetails->getChandraRasi();
    $chandraRasiLord = $chandraRasi->getLord();

    $sooryaRasi = $nakshatraDetails->getSooryaRasi();
    $sooryaRasiLord = $sooryaRasi->getLord();

    $zodiac = $nakshatraDetails->getZodiac();

    $additionalInfo = $nakshatraDetails->getAdditionalInfo();

    $mangalDosha = $result->getMangalDosha();

    $yogaDetails = $result->getYogaDetails();

    $dashaPeriods = $result->getDashaPeriods();

    $kundliResult = [
        'nakshatraDetails' => [
            'nakshatra' => [
                'id' => $nakshatra->getId(),
                'name' => $nakshatra->getName(),
                'lord' => [
                    'id' => $nakshatraLord->getId(),
                    'name' => $nakshatraLord->getName(),
                    'vedicName' => $nakshatraLord->getVedicName(),
                ],
                'pada' => $nakshatra->getPada(),
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
            'sooryaRasi' => [
                'id' => $sooryaRasi->getId(),
                'name' => $sooryaRasi->getName(),
                'lord' => [
                    'id' => $sooryaRasiLord->getId(),
                    'name' => $sooryaRasiLord->getName(),
                    'vedicName' => $sooryaRasiLord->getVedicName(),
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
        ],
        'mangalDosha' => [
            'hasDosha' => $mangalDosha->hasDosha(),
            'description' => $mangalDosha->getDescription(),
            'hasException' => $mangalDosha->hasException(),
            'type' => $mangalDosha->getType(),
            'exceptions' => $mangalDosha->getExceptions(),
        ],
    ];

    $yogaDetailResult = [];

    foreach ($yogaDetails as $details) {
        $yogaList = $details->getYogaList();
        $yogas = [];
        foreach ($yogaList as $yoga) {
            $yogas = [
                'name' => $yoga->getName(),
                'hasYoga' => $yoga->hasYoga(),
                'description' => $yoga->getDescription(),
            ];
        }
        $yogaDetailResult[] = [
            'name' => $details->getName(),
            'description' => $details->getDescription(),
            'yogaList' => $yogas,
        ];
    }

    $kundliResult['yogaDetails'] = $yogaDetailResult;

    $dashaPeriodResult = [];
    foreach ($dashaPeriods as $dashaPeriod) {
        $antardashas = $dashaPeriod->getAntardasha();
        $antardashaResult = [];
        foreach ($antardashas as $antardasha) {
            $pratyantardashas = $antardasha->getPratyantardasha();
            $pratyantardashaResult = [];
            foreach ($pratyantardashas as $pratyantardasha) {
                $pratyantardashaResult[] = [
                    'id' => $pratyantardasha->getId(),
                    'name' => $pratyantardasha->getName(),
                    'start' => $pratyantardasha->getStart(),
                    'end' => $pratyantardasha->getEnd(),
                ];
            }
            $antardashaResult[] = [
                'id' => $antardasha->getId(),
                'name' => $antardasha->getName(),
                'start' => $antardasha->getStart(),
                'end' => $antardasha->getEnd(),
                'pratyantardasha' => $pratyantardashaResult,
            ];
        }
        $dashaPeriodResult[] = [
            'id' => $dashaPeriod->getId(),
            'name' => $dashaPeriod->getName(),
            'start' => $dashaPeriod->getStart(),
            'end' => $dashaPeriod->getEnd(),
            'antardasha' => $antardashaResult,
        ];
    }
    $kundliResult['dashaPeriods'] = $dashaPeriodResult;
    print_r($kundliResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
