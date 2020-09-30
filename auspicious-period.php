<?php
use Prokerala\Api\Astrology\Location;
use Prokerala\Common\Api\Client;

include  'prepend.inc.php';

$client = new Client($apiKey);

/**
 * AuspiciousPeriod
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
    $method = new \Prokerala\Api\Astrology\Service\AuspiciousPeriod($client);
    $method->process($location, $datetime);
    $result = $method->getResult();

    $auspiciousPeriod = [];

    $fields = ['abhijitMuhurat', 'amritKaal', 'brahmaMuhurat'];

    foreach ($fields as $field) {
        $functionName = 'get'.ucwords($field);
        $muhurat = $result->$functionName();

        if(is_array($muhurat)){
            foreach ($muhurat as $data){
                $auspiciousPeriod[$field][] =
                    [
                        'start' => $data->getStart(),
                        'end' => $data->getEnd(),
                    ];
            }
            continue;
        }
        
        foreach (['start', 'end'] as $value) {
            $functionName = 'get'.ucwords($value);
            $auspiciousPeriod[$field][$value] = $muhurat->$functionName();
        }
    }

    print_r($auspiciousPeriod);

} catch (QuotaExceededException $e) {

} catch (RateLimitExceededException $e) {

}

