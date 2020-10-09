<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Prokerala\Api\Astrology\NakshatraProfile;
use Prokerala\Api\Astrology\Service\NakshatraPorutham;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/**
 * Nakshatra Porutham.
 */
$client = new Client($apiKey);

$girl_input = [
    'nakshatra' => 0,
    'nakshatra_pada' => 2,
];

$boy_input = [
    'nakshatra' => 13,
    'nakshatra_pada' => 3,
];

$girl_nakshatra = $girl_input['nakshatra'];
$girl_nakshatra_pada = $girl_input['nakshatra_pada'];
$girl_profile = new NakshatraProfile($girl_nakshatra, $girl_nakshatra_pada);

$boy_nakshatra = $boy_input['nakshatra'];
$boy_nakshatra_pada = $boy_input['nakshatra_pada'];
$boy_profile = new NakshatraProfile($boy_nakshatra, $boy_nakshatra_pada);

$nakshatra_porutham = new NakshatraPorutham($client);

try {
    $nakshatra_porutham->process($girl_profile, $boy_profile, true);
    $result = $nakshatra_porutham->getResult();

    $fields = [
        'dinaPorutham',
        'ganaPorutham',
        'mahendraPorutham',
        'streeDhrirghamPorutham',
        'yoniPorutham',
        'rasiPorutham',
        'rasiLordPorutham',
        'rajjuPorutham',
        'vedaPorutham',
        'vashyaPorutham',
    ];

    $compatibilityResult = [];

    $compatibilityResult['maximumPoint'] = $result->getMaximumPoint();
    $compatibilityResult['ObtainedPoint'] = $result->getObtainedPoint();

    foreach ($fields as $field) {
        $functionName = 'get'.ucwords($field);
        $poruthamResult = $result->{$functionName}();
        foreach (['hasPorutham', 'poruthamStatus', 'point', 'description'] as $value) {
            $functionName = 'get'.ucwords($value);
            $compatibilityResult[$field][$value] = $poruthamResult->{$functionName}();
        }
    }
    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}

try {
    $nakshatra_porutham->process($girl_profile, $boy_profile);
    $result = $nakshatra_porutham->getResult();

    $compatibilityResult = [];

    $compatibilityResult['maximumPoint'] = $result->getMaximumPoint();
    $compatibilityResult['ObtainedPoint'] = $result->getObtainedPoint();

    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
