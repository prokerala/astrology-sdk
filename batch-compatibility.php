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
 * Batch Compatibility Output.
 */
$input = [
    "profile"=> [
        "datetime"=> "2001-11-16T10:00:00+01:00",
        "coordinates"=> "9.9312,76.2673",
        "gender"=> "male"
    ],
  "match_profiles"=> [
      [
          "datetime"=> "2002-12-29T10:00:00+01:00",
          "coordinates"=> "48.8566,15.3522",
          "gender"=> "female"
      ],
      [
          "datetime"=> "2006-12-29T10:00:00+01:00",
          "coordinates"=> "48.8566,15.3522",
          "gender"=> "female"
      ],
      [
          "datetime"=> "2006-12-29T10:00:00+01:00",
          "coordinates"=> "55.8566,66.3522",
          "gender"=> "female"
      ],
      [
          "datetime"=> "2004-12-29T10:00:00+01:00",
          "coordinates"=> "32.8566,20.3522",
          "gender"=> "female"
      ],
  ],
  "compatibility_system"=> "guna-milan"
];


try {
    $profileDateTime = new DateTimeImmutable($input['profile']['datetime']);
    $tz = $profileDateTime->getTimezone();
    $locationCoordinates = (explode(',',$input['profile']['coordinates']));
    $location = new Location($locationCoordinates[0], $locationCoordinates[1], 0, $tz);
    $input['profile']['datetime'] = $profileDateTime;
    $input['profile']['coordinates'] = $location;

    foreach ($input['match_profiles'] as $index => $matchProfile) {
        $matchDateTime = new DateTimeImmutable($matchProfile['datetime']);
        $tz = $matchDateTime->getTimezone();
        $locationCoordinates = (explode(',',$matchProfile['coordinates']));
        $location = new Location($locationCoordinates[0], $locationCoordinates[1], 0, $tz);

        $input['match_profiles'][$index]['datetime'] = $matchDateTime;
        $input['match_profiles'][$index]['coordinates'] = $location;
    }
} catch (Exception $e) {

}

try {
    $method = new \Prokerala\Api\Astrology\Service\BatchCompatibility($client);
    $result = $method->process($input);
    $batchCompatibility = $result->getBatchCompatibility();

    $batchCompatibilityResult = [];

    foreach ($batchCompatibility as $index => $matching) {
        if($matching->getResult() !== null && $matching->getError() === null){
            $batchMarriage = $matching->getResult();
            $type = $batchMarriage->getStatus();
            $description = $batchMarriage->getDescription();
            $batchCompatibilityResult[$index] = ['status' => $type, 'description' => $description];
        }
    }
    print_r($batchCompatibilityResult);
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
