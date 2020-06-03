<?php

include __DIR__ . '/../vendor/autoload.php';

use Prokerala\Api\Astrology\Ayanamsa;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Result\Nakshatra;
use Prokerala\Api\Astrology\Result\Planet;
use Prokerala\Api\Astrology\Service\HoroscopeMatch;
use Prokerala\Api\Astrology\Service\KundliMatch;
use Prokerala\Api\Astrology\Service\MangalDosha;
use Prokerala\Api\Astrology\Service\NakshatraPorutham;
use Prokerala\Api\Astrology\Service\Panchang;
use Prokerala\Api\Astrology\Service\PlanetPosition;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\InvalidArgumentException;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

const API_KEY = 'YOUR_API_KEY_HERE';

/*
 * Panchang Details
 * Ayanamsa can be lahiri, raman, kp. (Default ayanamsa is lahiri)
 * eg : Ayanamsa::LAHIRI, Ayanamsa::RAMAN, Ayanamsa::KP
 * datetime should be in ISO 8601 format
 * coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
 */

$apiKey = API_KEY === 'YOUR_API_KEY_HERE' ? getenv('API_KEY') : API_KEY;

function handleException($e) {
    echo PHP_EOL;

    if ($e instanceof QuotaExceededException) {
        echo "ERROR: You have exceeded your quota allocation for the day", PHP_EOL;
        exit(1);
    } else if ($e instanceof RateLimitedException) {
        echo "ERROR: Rate limit exceeded. Throttle your requests.", PHP_EOL;
        exit(2);
    } else {
        echo "API Request Failed with error {$e->getMessage()}", PHP_EOL, PHP_EOL;
    }
}

try {
    $latitude = 10.214747;
    $longitude = 78.097626;
    // $datetime_string = '2004-02-01T15:19:21Z';//input time in UTC
    $datetime_string = '2004-02-01T15:19:21+05:30'; //input time in user timezone
    $datetime = new DateTime($datetime_string);

    $client = new Client($apiKey);
    $location = new Location($latitude, $longitude);
    $panchang = new Panchang($client);

    // If you want to use different ayanamsa, use the setAyanamsa() method.

    $panchang->setAyanamsa(Ayanamsa::RAMAN);

    $result = $panchang->process($location, $datetime);

    print_r($result->getTithi());
    print_r($result->getNakshatra());
    print_r($result->getKarana());
    print_r($result->getVasara());
    print_r($result->getYoga());

    $tithi = $result->getTithi()[0];
    print_r($tithi->getStartTime());
    print_r("\n\n" . $tithi->getName());

    foreach ($result->getNakshatra() as $key => $value) {
        $arNakshatra[$key] = [
            'id' => $value->getId(),
            'name' => $value->getName(),
            'start' => $value->getStartTime(),
            'end' => $value->getEndTime(),
        ];
    }
    print_r($arNakshatra);

    print_r("\n\n" . Nakshatra::NAKSHATRA_UTTARA_BHADRAPADA);

    print_r("\n\n" . $result->getInput()->datetime);
} catch (\Exception $e) {
    handleException($e);
}

/*
 * Planet Positions details
 * Ayanamsa can be lahiri, raman, kp. (Default ayanamsa is lahiri)
 * datetime should be in ISO 8601 format
 * coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
 */

try {
    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = Ayanamsa::LAHIRI;
    $datetime_string = '2004-02-01T15:19:21Z'; //input time in UTC
    // $datetime_string = '2004-02-01T15:19:21+05:30';//input time in user timezone
    $datetime = new DateTime($datetime_string);

    $client = new Client($apiKey);
    $location = new Location($latitude, $longitude);
    $planet_position = new PlanetPosition($client);

    $planet_position_result = $planet_position->process($location, $datetime);
    $arPlanet = $planet_position_result->getPlanets();

    print_r($arPlanet);

    print_r($arPlanet[Planet::PLANET_MOON]->getName());

    print_r($arPlanet[Planet::PLANET_MOON]->getDegree());
} catch (\Exception $e) {
    handleException($e);
}

/*
 * Manglik/Mangal Dosha details
 * Ayanamsa can be lahiri, raman, kp. (Default ayanamsa is lahiri)
 * datetime should be in ISO 8601 format
 * coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
 */

try {
    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = Ayanamsa::LAHIRI;
    $datetime_string = '2004-02-01T15:19:21Z'; //input time in UTC
    // $datetime_string = '2004-02-01T15:19:21+05:30';//input time in user timezone
    $datetime = new DateTime($datetime_string);

    $client = new Client($apiKey);
    $location = new Location($latitude, $longitude);
    $manglik_service = new MangalDosha($client);

    $mangal_dosha = $manglik_service->process($location, $datetime);

    print_r($mangal_dosha->getInput());

    $mangal_dosha_result = $mangal_dosha->getResult();

    print_r($mangal_dosha_result);

    print_r($mangal_dosha_result->nakshatra);

    print_r($mangal_dosha_result->nakshatra->getName());

    print_r($mangal_dosha_result->manglik_status);
} catch (\Exception $e) {
    handleException($e);
}

/**
 * Kundali Matching/Gun Milan/Ashta Koot details
 * (It is the north indian match making method)
 *
 * Ayanamsa can be lahiri, raman, kp. (Default ayanamsa is lahiri)
 * dob/datetime should be in ISO 8601 format
 * coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
 */
$bride_dob = '2004-02-12T15:19:21+00:00';
$bride_coordinates = '10.214747,78.097626';
$groom_dob = '2004-02-12T15:19:21+00:00';
$groom_coordinates = '10.214747,78.097626';

try {
    $client = new Client($apiKey);
    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = Ayanamsa::LAHIRI;
    $datetime_string = '2004-02-01T15:19:21Z'; //input time in UTC
    // $datetime_string = '2004-02-01T15:19:21+05:30';//input time in user timezone
    $bride_dob = new DateTime($datetime_string);
    $bride_location = new Location($latitude, $longitude);
    $bride_profile = new Profile($bride_location, $bride_dob);

    $latitude = 10.214747;
    $longitude = 78.097626;
    $datetime_string = '2019-01-01T15:19:21Z'; //input time in UTC
    // $datetime_string = '2019-01-01T15:19:21+05:30';////input time in user timezone
    $groom_dob = new DateTime($datetime_string);
    $groom_location = new Location($latitude, $longitude);
    $groom_profile = new Profile($groom_location, $groom_dob);

    $kundli_match_service = new KundliMatch($client);

    $kundli_match = $kundli_match_service->process($bride_profile, $groom_profile);

    print_r($kundli_match->getInput());

    $kundli_match_result = $kundli_match->getResult();

    print_r($kundli_match_result);

    print_r($kundli_match_result->bridegroom_details);

    print_r($kundli_match_result->bridegroom_details->nakshatra_details->getName());

    print_r($kundli_match_result->result);
} catch (\Exception $e) {
    handleException($e);
}

/*
 * Horoscope Matching/Dasha Porutham/Dasha Koot details
 * (It is the south indian match making method)
 *
 * System should be either kerala/tamil
 * Ayanamsa can be lahiri, raman, kp. (Default ayanamsa is lahiri)
 * dob should be in ISO 8601 format
 * coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
 */

try {
    $client = new Client($apiKey);
    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = Ayanamsa::LAHIRI;
    $system = 'kerala';
    $datetime_string = '2004-02-01T15:19:21Z'; //input time in UTC
    // $datetime_string = '2004-02-01T15:19:21+05:30';//input time in user timezone
    $bride_dob = new DateTime($datetime_string);
    $bride_location = new Location($latitude, $longitude);
    $bride_profile = new Profile($bride_location, $bride_dob);

    $latitude = 10.214747;
    $longitude = 78.097626;
    $datetime_string = '2019-01-01T15:19:21Z';
    $groom_dob = new DateTime($datetime_string);
    $groom_location = new Location($latitude, $longitude);
    $groom_profile = new Profile($groom_location, $groom_dob);

    $horoscope_match_service = new HoroscopeMatch($client, $ayanamsa);

    $horoscope_match = $horoscope_match_service->process($bride_profile, $groom_profile, $system);

    print_r($horoscope_match->getInput());

    $horoscope_match_result = $horoscope_match->getResult();

    print_r($horoscope_match_result);

    print_r($horoscope_match_result->bridegroom_details);

    print_r($horoscope_match_result->bridegroom_details->nakshatra_details->getName());

    print_r("\n\n" . $horoscope_match_result->papa_samaya_result->papa_status);

    print_r("\n\n" . $horoscope_match_result->average_porutham);

    print_r("\n\n" . $horoscope_match_result->compatibility);

    print_r((array)$horoscope_match_result->detailed_information);
} catch (\Exception $e) {
    handleException($e);
}

 /*
 * Nakshatra Porutham/
 * (It is the south indian match making method)
 *
 * Language is english
 * (Nakshatras Numbered from Aswini to Revathi as 1 - 27, If nakshatra have pada should be numbered as nakshatra-pada format eg: Krithika - 1st Pada as 3-1 ...)

 *bride and groom stars should be a valid number format eg : `21-3` or 20
 */

try {
    $client = new Client($apiKey);
    $lang = 'en';
    $bride_star = 2; //Bhrani
    $groom_star = '21-2'; //Uttara Ashadha - 2nd Pada,

    $nakshatra_match_service = new NakshatraPorutham($client);

    $nakshatra_match = $nakshatra_match_service->process($bride_star, $groom_star, $lang);

    print_r($nakshatra_match->getInput());

    $nakshatra_match_result = $nakshatra_match->getResult();

    print_r($nakshatra_match_result);

    print_r($nakshatra_match_result->result);

    print_r($nakshatra_match_result->result->dina);

    print_r($nakshatra_match_result->porutham_details);

    print_r($nakshatra_match_result->nakshatras_details);
} catch (\Exception $e) {
    handleException($e);
}
