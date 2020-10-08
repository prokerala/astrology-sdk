<?php
use Prokerala\Api\Astrology\Location;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include  'prepend.inc.php';

$client = new Client($apiKey);

/**
 * Kaal Sarp Dosha
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
    $method = new \Prokerala\Api\Astrology\Service\Papasamyam($client);
    $method->process($location, $datetime);
    $result = $method->getResult();

    $papasamyamResult['total_point'] = $result->getTotalPoint();
    $papaSamyam = $result->getPapaSamyam();
    $papaPlanets = $papaSamyam->getPapaPlanet();
    foreach ($papaPlanets as $idx => $papaPlanet) {
        $papasamyamResult['papaPlanet'][$idx]['name'] = $papaPlanet->getName();
        $planetDoshas = $papaPlanet->getPlanetDosha();
        foreach ($planetDoshas as $planetDosha) {
            $papasamyamResult['papaPlanet'][$idx]['planetDosha'][] = [
              'id' => $planetDosha->getId(),
              'name' => $planetDosha->getName(),
              'position' => $planetDosha->getPosition(),
              'hasDosha' => $planetDosha->getHasDosha(),
            ];
        }

    }
    print_r($papasamyamResult);
} catch (QuotaExceededException $e) {

} catch (RateLimitExceededException $e) {

}

