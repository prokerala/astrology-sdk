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
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Service\Porutham;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/** @var \Prokerala\Common\Api\Client $client */

/**
 * Porutham.
 */
$girl_input = [
    'datetime' => '1967-08-29T09:00:00+05:30',
    'latitude' => '19.0821978',
    'longitude' => '72.7411014', // Mumbai
];

$boy_input = [
    'datetime' => '1970-11-10T09:20:00+05:30',
    'latitude' => '22.6757521',
    'longitude' => '88.0495418', // Kolkata
];

$girl_location = new Location($girl_input['latitude'], $girl_input['longitude']);
$girl_dob = new DateTimeImmutable($girl_input['datetime']);
$girl_profile = new Profile($girl_location, $girl_dob);

$boy_location = new Location($boy_input['latitude'], $boy_input['longitude']);
$boy_dob = new DateTimeImmutable($boy_input['datetime']);
$boy_profile = new Profile($boy_location, $boy_dob);

$porutham = new Porutham($client);

try {
    $result = $porutham->process($girl_profile, $boy_profile, 'tamil');
    $compatibilityResult = [];
    $girl_info = $result->getGirlInfo();
    $girl_nakshatra = $girl_info->getNakshatra();
    $girl_rasi = $girl_info->getRasi();

    $boy_info = $result->getBoyInfo();
    $boy_nakshatra = $boy_info->getNakshatra();
    $boy_rasi = $boy_info->getRasi();

    $girl_nakshatra_lord = $girl_nakshatra->getLord();
    $boy_nakshatra_lord = $boy_nakshatra->getLord();

    $girl_rasi_lord = $girl_rasi->getLord();
    $boy_rasi_lord = $boy_rasi->getLord();

    $compatibilityResult['girlInfo'] = [
        'nakshatra' => [
            'id' => $girl_nakshatra->getId(),
            'name' => $girl_nakshatra->getName(),
            'pada' => $girl_nakshatra->getPada(),
            'lord' => [
                'id' => $girl_nakshatra_lord->getId(),
                'name' => $girl_nakshatra_lord->getName(),
                'vedicName' => $girl_nakshatra_lord->getVedicName(),
            ],
        ],
        'rasi' => [
            'id' => $girl_rasi->getId(),
            'name' => $girl_rasi->getName(),
            'lord' => [
                'id' => $girl_rasi_lord->getId(),
                'name' => $girl_rasi_lord->getName(),
                'vedicName' => $girl_rasi_lord->getVedicName(),
            ],
        ],
    ];

    $compatibilityResult['boyInfo'] = [
        'nakshatra' => [
            'id' => $boy_nakshatra->getId(),
            'name' => $boy_nakshatra->getName(),
            'pada' => $boy_nakshatra->getPada(),
            'lord' => [
                'id' => $boy_nakshatra_lord->getId(),
                'name' => $boy_nakshatra_lord->getName(),
                'vedicName' => $boy_nakshatra_lord->getVedicName(),
            ],
        ],
        'rasi' => [
            'id' => $boy_rasi->getId(),
            'name' => $boy_rasi->getName(),
            'lord' => [
                'id' => $boy_rasi_lord->getId(),
                'name' => $boy_rasi_lord->getName(),
                'vedicName' => $boy_rasi_lord->getVedicName(),
            ],
        ],
    ];

    $compatibilityResult['maximumPoints'] = $result->getMaximumPoints();
    $compatibilityResult['totalPoints'] = $result->getTotalPoints();
    $message = $result->getMessage();
    $compatibilityResult['message'] = [
        'type' => $message->getType(),
        'description' => $message->getDescription(),
    ];

    $match_result = $result->getMatches();
    $matches = [];
    foreach ($match_result as $match) {
        $matches[] = [
            'id' => $match->getId(),
            'name' => $match->getName(),
            'hasPorutham' => $match->hasPorutham(),
        ];
    }

    $compatibilityResult['matches'] = $matches;
    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $result = $porutham->process($girl_profile, $boy_profile, 'kerala', true);
    $compatibilityResult = [];
    $girl_info = $result->getGirlInfo();
    $girl_nakshatra = $girl_info->getNakshatra();
    $girl_rasi = $girl_info->getRasi();

    $boy_info = $result->getBoyInfo();
    $boy_nakshatra = $boy_info->getNakshatra();
    $boy_rasi = $boy_info->getRasi();

    $girl_nakshatra_lord = $girl_nakshatra->getLord();
    $boy_nakshatra_lord = $boy_nakshatra->getLord();

    $girl_rasi_lord = $girl_rasi->getLord();
    $boy_rasi_lord = $boy_rasi->getLord();

    $compatibilityResult['girlInfo'] = [
        'nakshatra' => [
            'id' => $girl_nakshatra->getId(),
            'name' => $girl_nakshatra->getName(),
            'pada' => $girl_nakshatra->getPada(),
            'lord' => [
                'id' => $girl_nakshatra_lord->getId(),
                'name' => $girl_nakshatra_lord->getName(),
                'vedicName' => $girl_nakshatra_lord->getVedicName(),
            ],
        ],
        'rasi' => [
            'id' => $girl_rasi->getId(),
            'name' => $girl_rasi->getName(),
            'lord' => [
                'id' => $girl_rasi_lord->getId(),
                'name' => $girl_rasi_lord->getName(),
                'vedicName' => $girl_rasi_lord->getVedicName(),
            ],
        ],
    ];

    $compatibilityResult['boyInfo'] = [
        'nakshatra' => [
            'id' => $boy_nakshatra->getId(),
            'name' => $boy_nakshatra->getName(),
            'pada' => $boy_nakshatra->getPada(),
            'lord' => [
                'id' => $boy_nakshatra_lord->getId(),
                'name' => $boy_nakshatra_lord->getName(),
                'vedicName' => $boy_nakshatra_lord->getVedicName(),
            ],
        ],
        'rasi' => [
            'id' => $boy_rasi->getId(),
            'name' => $boy_rasi->getName(),
            'lord' => [
                'id' => $boy_rasi_lord->getId(),
                'name' => $boy_rasi_lord->getName(),
                'vedicName' => $boy_rasi_lord->getVedicName(),
            ],
        ],
    ];
    $compatibilityResult['maximumPoints'] = $result->getMaximumPoints();
    $compatibilityResult['totalPoints'] = $result->getTotalPoints();
    $message = $result->getMessage();
    $compatibilityResult['message'] = [
        'type' => $message->getType(),
        'description' => $message->getDescription(),
    ];

    $match_result = $result->getMatches();
    $matches = [];
    foreach ($match_result as $match) {
        $matches[] = [
            'id' => $match->getId(),
            'name' => $match->getName(),
            'hasPorutham' => $match->hasPorutham(),
            'poruthamStatus' => $match->getPoruthamStatus(),
            'points' => $match->getPoints(),
            'description' => $match->getDescription(),
        ];
    }

    $compatibilityResult['matches'] = $matches;
    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $result = $porutham->process($girl_profile, $boy_profile, 'kerala');
    $compatibilityResult = [];
    $girl_info = $result->getGirlInfo();
    $girl_nakshatra = $girl_info->getNakshatra();
    $girl_rasi = $girl_info->getRasi();

    $boy_info = $result->getBoyInfo();
    $boy_nakshatra = $boy_info->getNakshatra();
    $boy_rasi = $boy_info->getRasi();

    $girl_nakshatra_lord = $girl_nakshatra->getLord();
    $boy_nakshatra_lord = $boy_nakshatra->getLord();

    $girl_rasi_lord = $girl_rasi->getLord();
    $boy_rasi_lord = $boy_rasi->getLord();

    $compatibilityResult['girlInfo'] = [
        'nakshatra' => [
            'id' => $girl_nakshatra->getId(),
            'name' => $girl_nakshatra->getName(),
            'pada' => $girl_nakshatra->getPada(),
            'lord' => [
                'id' => $girl_nakshatra_lord->getId(),
                'name' => $girl_nakshatra_lord->getName(),
                'vedicName' => $girl_nakshatra_lord->getVedicName(),
            ],
        ],
        'rasi' => [
            'id' => $girl_rasi->getId(),
            'name' => $girl_rasi->getName(),
            'lord' => [
                'id' => $girl_rasi_lord->getId(),
                'name' => $girl_rasi_lord->getName(),
                'vedicName' => $girl_rasi_lord->getVedicName(),
            ],
        ],
    ];

    $compatibilityResult['boyInfo'] = [
        'nakshatra' => [
            'id' => $boy_nakshatra->getId(),
            'name' => $boy_nakshatra->getName(),
            'pada' => $boy_nakshatra->getPada(),
            'lord' => [
                'id' => $boy_nakshatra_lord->getId(),
                'name' => $boy_nakshatra_lord->getName(),
                'vedicName' => $boy_nakshatra_lord->getVedicName(),
            ],
        ],
        'rasi' => [
            'id' => $boy_rasi->getId(),
            'name' => $boy_rasi->getName(),
            'lord' => [
                'id' => $boy_rasi_lord->getId(),
                'name' => $boy_rasi_lord->getName(),
                'vedicName' => $boy_rasi_lord->getVedicName(),
            ],
        ],
    ];

    $compatibilityResult['maximumPoints'] = $result->getMaximumPoints();
    $compatibilityResult['totalPoints'] = $result->getTotalPoints();
    $message = $result->getMessage();
    $compatibilityResult['message'] = [
        'type' => $message->getType(),
        'description' => $message->getDescription(),
    ];

    $match_result = $result->getMatches();
    $matches = [];
    foreach ($match_result as $match) {
        $matches[] = [
            'id' => $match->getId(),
            'name' => $match->getName(),
            'hasPorutham' => $match->hasPorutham(),
        ];
    }

    $compatibilityResult['matches'] = $matches;
    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $result = $porutham->process($girl_profile, $boy_profile, 'tamil', true);
    $compatibilityResult = [];
    $girl_info = $result->getGirlInfo();
    $girl_nakshatra = $girl_info->getNakshatra();
    $girl_rasi = $girl_info->getRasi();

    $boy_info = $result->getBoyInfo();
    $boy_nakshatra = $boy_info->getNakshatra();
    $boy_rasi = $boy_info->getRasi();

    $girl_nakshatra_lord = $girl_nakshatra->getLord();
    $boy_nakshatra_lord = $boy_nakshatra->getLord();

    $girl_rasi_lord = $girl_rasi->getLord();
    $boy_rasi_lord = $boy_rasi->getLord();

    $compatibilityResult['girlInfo'] = [
        'nakshatra' => [
            'id' => $girl_nakshatra->getId(),
            'name' => $girl_nakshatra->getName(),
            'pada' => $girl_nakshatra->getPada(),
            'lord' => [
                'id' => $girl_nakshatra_lord->getId(),
                'name' => $girl_nakshatra_lord->getName(),
                'vedicName' => $girl_nakshatra_lord->getVedicName(),
            ],
        ],
        'rasi' => [
            'id' => $girl_rasi->getId(),
            'name' => $girl_rasi->getName(),
            'lord' => [
                'id' => $girl_rasi_lord->getId(),
                'name' => $girl_rasi_lord->getName(),
                'vedicName' => $girl_rasi_lord->getVedicName(),
            ],
        ],
    ];

    $compatibilityResult['boyInfo'] = [
        'nakshatra' => [
            'id' => $boy_nakshatra->getId(),
            'name' => $boy_nakshatra->getName(),
            'pada' => $boy_nakshatra->getPada(),
            'lord' => [
                'id' => $boy_nakshatra_lord->getId(),
                'name' => $boy_nakshatra_lord->getName(),
                'vedicName' => $boy_nakshatra_lord->getVedicName(),
            ],
        ],
        'rasi' => [
            'id' => $boy_rasi->getId(),
            'name' => $boy_rasi->getName(),
            'lord' => [
                'id' => $boy_rasi_lord->getId(),
                'name' => $boy_rasi_lord->getName(),
                'vedicName' => $boy_rasi_lord->getVedicName(),
            ],
        ],
    ];

    $compatibilityResult['maximumPoints'] = $result->getMaximumPoints();
    $compatibilityResult['totalPoints'] = $result->getTotalPoints();
    $message = $result->getMessage();
    $compatibilityResult['message'] = [
        'type' => $message->getType(),
        'description' => $message->getDescription(),
    ];

    $match_result = $result->getMatches();
    $matches = [];
    foreach ($match_result as $match) {
        $matches[] = [
            'id' => $match->getId(),
            'name' => $match->getName(),
            'hasPorutham' => $match->hasPorutham(),
            'poruthamStatus' => $match->getPoruthamStatus(),
            'points' => $match->getPoints(),
            'description' => $match->getDescription(),
        ];
    }

    $compatibilityResult['matches'] = $matches;
    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
