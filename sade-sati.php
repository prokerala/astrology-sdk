<?php
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Service\SadeSati;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\InvalidArgumentException;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Api\Astrology\Location;

include  'prepend.inc.php';

/**
 * Sade Sati
 */
$client = new Client($apiKey);


$latitude = 10.214747;
$longitude = 78.097626;

$datetime_string = '2004-02-01T15:19:21+05:30'; //input time in user timezone
$datetime = new DateTime($datetime_string);

$client = new Client($apiKey);

$location = new Location($latitude, $longitude, 0, new DateTimeZone('Asia/Kolkata'));


$sade_sati = new SadeSati($client);

try {
    $sade_sati->process($location, $datetime);
    $result = $sade_sati->getResult();
    print_r($result); exit;
    $fields = [
        'dinaPorutham',
        'ganaPorutham',
        'mahendraPorutham',
        'rajjuPorutham',
        'rasiPorutham',
        'rasyadhipaPorutham',
        'streeDhrirghamPorutham',
        'vasyaPorutham',
        'vedaPorutham',
        'yoniPorutham',
    ];

    $compatibilityResult = [];

    $compatibilityResult['totalPoint'] = $result->getTotalPoint();
    $compatibilityResult['compatibility'] = $result->getCompatibility();


    foreach ($fields as $field) {
        $functionName = 'get'.ucwords($field);
        $poruthamResult = $result->$functionName();
        foreach (['result', 'point', 'comment'] as $value) {
            $functionName = 'get'.ucwords($value);
            $compatibilityResult[$field][$value] = $poruthamResult->$functionName();
        }
    }
    print_r($compatibilityResult);
} catch (QuotaExceededException $e) {

} catch (RateLimitExceededException $e) {

}

