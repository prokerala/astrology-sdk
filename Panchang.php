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
    $method = new \Prokerala\Api\Astrology\Service\Panchang($client);
    $method->process($location, $datetime);
    $result = $method->getResult();

    $panchangResult = [
        'vaara' => $result->getVaara(),
        'sunrise' => $result->getSunrise(),
        'sunset' => $result->getSunset(),
        'moonrise' => $result->getMoonrise(),
        'moonset' => $result->getMoonset()
    ];

    $nakshatras = $result->getNakshatra();
    $tithis = $result->getTithi();
    $karanas = $result->getKarana();
    $yogas = $result->getYoga();

    foreach($nakshatras as $nakshatra) {
        $panchangResult['nakshatra'][] = [
            'id' => $nakshatra->getId(),
            'name' => $nakshatra->getName(),
            'start' => $nakshatra->getStart(),
            'end' => $nakshatra->getEnd(),
        ];
    }
    foreach($tithis as $tithi) {
        $panchangResult['tithi'][] = [
            'index' => $tithi->getIndex(),
            'id' => $tithi->getId(),
            'name' => $tithi->getName(),
            'start' => $tithi->getStart(),
            'end' => $tithi->getEnd(),
        ];
    }

    foreach($karanas as $karana) {
        $panchangResult['karana'][] = [
            'index' => $karana->getIndex(),
            'id' => $karana->getId(),
            'name' => $karana->getName(),
            'start' => $karana->getStart(),
            'end' => $karana->getEnd(),
        ];
    }

    foreach($yogas as $yoga) {
        $panchangResult['yoga'][] = [
            'id' => $yoga->getId(),
            'name' => $yoga->getName(),
            'start' => $yoga->getStart(),
            'end' => $yoga->getEnd(),
        ];
    }
   // print_r($panchangResult); exit;
} catch (QuotaExceededException $e) {

} catch (RateLimitExceededException $e) {

}

try {
    $method = new \Prokerala\Api\Astrology\Service\Panchang($client);
    $method->process($location, $datetime, true);
    $result = $method->getResult();

    $panchangResult = [
        'vaara' => $result->getVaara(),
        'sunrise' => $result->getSunrise(),
        'sunset' => $result->getSunset(),
        'moonrise' => $result->getMoonrise(),
        'moonset' => $result->getMoonset()
    ];

    $nakshatras = $result->getNakshatra();
    $tithis = $result->getTithi();
    $karanas = $result->getKarana();
    $yogas = $result->getYoga();

    foreach($nakshatras as $nakshatra) {
        $panchangResult['nakshatra'][] = [
            'id' => $nakshatra->getId(),
            'name' => $nakshatra->getName(),
            'start' => $nakshatra->getStart(),
            'end' => $nakshatra->getEnd(),
        ];
    }
    foreach($tithis as $tithi) {
        $panchangResult['tithi'][] = [
            'index' => $tithi->getIndex(),
            'id' => $tithi->getId(),
            'name' => $tithi->getName(),
            'start' => $tithi->getStart(),
            'end' => $tithi->getEnd(),
        ];
    }

    foreach($karanas as $karana) {
        $panchangResult['karana'][] = [
            'index' => $karana->getIndex(),
            'id' => $karana->getId(),
            'name' => $karana->getName(),
            'start' => $karana->getStart(),
            'end' => $karana->getEnd(),
        ];
    }

    foreach($yogas as $yoga) {
        $panchangResult['yoga'][] = [
            'id' => $yoga->getId(),
            'name' => $yoga->getName(),
            'start' => $yoga->getStart(),
            'end' => $yoga->getEnd(),
        ];
    }

    $auspiciousPeriod = [];

    $auspiciousPeriodResult = $result->getAuspiciousPeriod();

    $fields = ['abhijit_muhurat', 'amrit_kaal', 'brahma_muhurat'];

    foreach ($fields as $field) {
        $fieldname = str_replace('_',' ',$field);
        $functionName = str_replace(' ','','get'.ucwords($fieldname));

        $muhurat = $auspiciousPeriodResult->$functionName();

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

    $panchangResult['auspiciousPeriod'] = $auspiciousPeriod;

    $inauspiciousPeriod = [];
    $inauspiciousPeriodResult = $result->getInauspiciousPeriod();
    $fields = ['rahu_kaal', 'yamaganda_kaal', 'gulika_kaal', 'dur_muhurat', 'varjyam'];

    foreach ($fields as $field) {
        $fieldname = str_replace('_',' ',$field);
        $functionName = str_replace(' ','','get'.ucwords($fieldname));
        $muhurat = $inauspiciousPeriodResult->$functionName();

        if(is_array($muhurat)){
            foreach ($muhurat as $data){
                $inauspiciousPeriod[$field][] =
                    [
                        'start' => $data->getStart(),
                        'end' => $data->getEnd(),
                    ];
            }
            continue;
        }

        $inauspiciousPeriod[$field] = [
            'start' => $muhurat->getStart(),
            'end' => $muhurat->getEnd(),
        ];
    }
    $panchangResult['inauspiciousPeriod'] = $inauspiciousPeriod;

    print_r($panchangResult); exit;
    $nakshatraDetails = $result->getNakshatraDetails();
    $nakshatraResult = [
        'nakshatraName' => $nakshatraDetails->getNakshatraName(),
        'nakshatraLongitude' => $nakshatraDetails->getNakshatraLongitude(),
        'nakshatraStart' => $nakshatraDetails->getNakshatraStart(),
        'nakshatraEnd' => $nakshatraDetails->getNakshatraEnd(),
        'nakshatraPada' => $nakshatraDetails->getNakshatraPada(),
    ];

    foreach (['chandraRasi', 'sooryaRasi', 'zodiac'] as $item) {
        $fn = 'get'.ucwords($item);
        $itemResult = $nakshatraDetails->$fn();
        $nakshatraResult[$item] = [
            'id' => $itemResult->getId(),
            'name' => $itemResult->getName(),
            'longitude' => $itemResult->getLongitude(),
        ];
    }
    $additionalInfo = $nakshatraDetails->getAdditionalInfo();
    foreach (["diety", "ganam", "symbol", "animalSign", "nadi", "color", "bestDirection", "syllables", "birthStone", "gender", "planet", "enemyYoni"] as $info) {
        $fn = 'get'.ucwords($info);
        $nakshatraResult['additionalInfo'][$info] = $additionalInfo->$fn();
    }

    $mangalDoshaResult = [];
    $mangalDoshaDetails = $result->getMangalDosha();

    $mangalDoshaResult['has_mangal_dosha'] = $mangalDoshaDetails->getHasMangalDosha();
    $mangalDoshaResult['has_exception'] = $mangalDoshaDetails->getHasException();
    $mangalDoshaResult['mangal_dosha_type'] = $mangalDoshaDetails->getMangalDoshaType();
    $mangalDoshaResult['description'] = $mangalDoshaDetails->getDescription();
    $mangalDoshaResult['exceptions'] = $mangalDoshaDetails->getexceptions();
    $mangalDoshaResult['remedies'] = $mangalDoshaDetails->getRemedies();

    $yogaDetails = $result->getYogas();
    $yogaResult = [];
    foreach (["majorYogas", "chandrayogas", "sooryaYogas", "inauspiciousYogas"] as $yoga) {
        $fn = 'get'.ucwords($yoga);
        $yogaResult[$yoga] = $yogaDetails->$fn();
    }

    $kundliResult = [
        'nakshatraDetails' => $nakshatraResult,
        'mangalDosha' => $mangalDoshaResult,
        'yogas' => $yogaResult
    ];
    print_r($kundliResult);

} catch (QuotaExceededException $e) {

} catch (RateLimitExceededException $e) {

}
