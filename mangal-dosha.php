<?php
use Prokerala\Api\Astrology\Location;
use Prokerala\Common\Api\Client;

include  'prepend.inc.php';

$client = new Client($apiKey);

/**
 * Mangal Dosha
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
    $method = new \Prokerala\Api\Astrology\Service\MangalDosha($client);
    $method->process($location, $datetime);
    $result = $method->getResult();


    $mangalDoshaResult = [];

    $mangalDoshaResult['has_mangal_dosha'] = $result->hasMangalDosha();
    $mangalDoshaResult['has_exception'] = $result->hasException();
    $mangalDoshaResult['mangal_dosha_type'] = $result->getMangalDoshaType();
    $mangalDoshaResult['description'] = $result->getDescription();
    $mangalDoshaResult['exceptions'] = $result->getexceptions();
    $mangalDoshaResult['remedies'] = $result->getRemedies();

    print_r($mangalDoshaResult);
} catch (QuotaExceededException $e) {

} catch (RateLimitExceededException $e) {

}

