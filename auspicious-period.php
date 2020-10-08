<?php
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Service\AuspiciousPeriod;
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
    $method = new AuspiciousPeriod($client);
    $method->process($location, $datetime);
    $result = $method->getResult();

    $auspiciousPeriod = [];

    $fields = ['abhijit_muhurat', 'amrit_kaal', 'brahma_muhurat'];

    foreach ($fields as $field) {
        $fieldname = str_replace('_',' ',$field);
        $functionName = str_replace(' ','','get'.ucwords($fieldname));

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


        $auspiciousPeriod[$field]  = [
            'start' => $muhurat->getStart(),
            'end' => $muhurat->getEnd(),
        ];

    }

    print_r($auspiciousPeriod);

} catch (QuotaExceededException $e) {

} catch (RateLimitExceededException $e) {

}

