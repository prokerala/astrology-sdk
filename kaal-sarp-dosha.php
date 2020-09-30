<?php
use Prokerala\Api\Astrology\Location;
use Prokerala\Common\Api\Client;

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
    $method = new \Prokerala\Api\Astrology\Service\KaalSarpDosha($client);
    $method->process($location, $datetime);
    $result = $method->getResult();

    $kaalSarpDoshaResult = [];

    $kaalSarpDoshaResult['kaal_sarp_type'] = $result->getKaalSarpType();
    $kaalSarpDoshaResult['kaal_sarp_dosha_type'] = $result->getKaalSarpDoshaType();
    $kaalSarpDoshaResult['has_kaal_sarp_dosha'] = $result->hasKaalSarpDosha();
    $kaalSarpDoshaResult['description'] = $result->getDescription();
    $kaalSarpDoshaResult['remedies'] = $result->getRemedies();

    print_r($kaalSarpDoshaResult);

} catch (QuotaExceededException $e) {

} catch (RateLimitExceededException $e) {

}

