<?php
include '../vendor/autoload.php';


use Prokerala\Astrology\Astro;

use Prokerala\Common\Api\Client;
use Prokerala\Api\Token;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Result\Nakshatra;
use Prokerala\Api\Astrology\Result\Planet;
use Prokerala\Api\Astrology\Service\Panchang;
use Prokerala\Api\Astrology\Service\HoroscopeMatch;
use Prokerala\Api\Astrology\Service\KundliMatch;
use Prokerala\Api\Astrology\Service\PlanetPosition;
use Prokerala\Api\Astrology\Service\MangalDosha;

use Prokerala\Common\Api\Exception\InvalidArgumentsException;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

const API_KEY = 'YOUR_API_KEY';


/**
 * Panchang Details
 * ayanamsa is always 1
 * datetime should be in ISO 8601 format
 * coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
 **/

try {

    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = 1;
    $datetime_string = '2004-02-01T15:19:21Z';
    $datetime = new DateTime($datetime_string);

    $client = new Client(API_KEY);
    $location = new Location($latitude, $longitude);
    $panchang = new Panchang($client);

    $result = $panchang->process($location, $datetime);

    print_r($result->getTithi());
    print_r($result->getNakshatra());
    print_r($result->getKarna());
    print_r($result->getVasara());
    print_r($result->getYoga());

    $tithi = $result->getTithi()[0];
    print_r("\n\n".$tithi->getStartTime());
    print_r("\n\n".$tithi->getName());

    foreach ($result->getNakshatra() as $key => $value) {
        $arNakshatra[$key] = [
            'id' => $value->getId(),
            'name' => $value->getName(),
            'start' => $value->getStartTime(),
            'end' => $value->getEndTime(),
        ];
    }
    print_r($arNakshatra);

    print_r("\n\n".Nakshatra::NAKSHATRA_UTTARA_BHADRAPADA);
    
    print_r("\n\n".$result->getInput()->datetime);

} catch (RateLimitExceededException $e) {
    echo "RateLimitExceededException \n\n";
} catch (QuotaExceededException $e) {
    echo "QuotaExceededException \n\n";
} catch (InvalidArgumentException $e) {
    echo "InvalidArgumentException \n\n";
} catch (\Exception $e) {
    echo "Exception  \n\n";
}


/**
 * Planet Positions details
 * ayanamsa is always 1
 * datetime should be in ISO 8601 format
 * coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
 **/

try {

    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = 1;
    $datetime_string = '2004-02-01T15:19:21Z';
    $datetime = new DateTime($datetime_string);

    $client = new Client(API_KEY);
    $location = new Location($latitude, $longitude);
    $planet_position = new PlanetPosition($client);

    $planet_position_result = $planet_position->process($location, $datetime);
    $arPlanet = $planet_position_result->getPlanets();

    print_r($arPlanet);

    print_r($arPlanet[Planet::PLANET_MOON]->getName());
    
    print_r($arPlanet[Planet::PLANET_MOON]->getDegree());

} catch (RateLimitExceededException $e) {
    echo "RateLimitExceededException \n\n";
} catch (QuotaExceededException $e) {
    echo "QuotaExceededException \n\n";
} catch (InvalidArgumentException $e) {
    echo "InvalidArgumentException \n\n";
} catch (\Exception $e) {
    echo "Exception  \n\n";
}


/**
 * Manglik/Mangal Dosha details
 * ayanamsa is always 1
 * datetime should be in ISO 8601 format
 * coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
 **/


try {

    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = 1;
    $datetime_string = '2004-02-01T15:19:21Z';
    $datetime = new DateTime($datetime_string);

    $client = new Client(API_KEY);
    $location = new Location($latitude, $longitude);
    $manglik_service = new MangalDosha($client);

    $mangal_dosha = $manglik_service->process($location, $datetime);
    
    print_r($mangal_dosha->getInput());
    
    $mangal_dosha_result = $mangal_dosha->getResult();
    
    print_r($mangal_dosha_result);
    
    print_r($mangal_dosha_result->result->nakshatra);
    
    print_r($mangal_dosha_result->result->nakshatra[0]->getName());
    
    print_r($mangal_dosha_result->result->manglik_status);

} catch (RateLimitExceededException $e) {
    echo "RateLimitExceededException \n\n";
} catch (QuotaExceededException $e) {
    echo "QuotaExceededException \n\n";
} catch (InvalidArgumentException $e) {
    echo "InvalidArgumentException \n\n";
} catch (\Exception $e) {
    echo "Exception  \n\n";
}



/**
 * Kundali Matching/Gun Milan/Ashta Koot details
 * (It is the north indian match making method)
 *
 * Ayanamsa is always 1
 * dob/datetime should be in ISO 8601 format
 * coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
 **/

$ayanamsa = 1;
$bride_dob = '2004-02-12T15:19:21+00:00';
$bride_coordinates = '10.214747,78.097626';
$groom_dob = '2004-02-12T15:19:21+00:00';
$groom_coordinates = '10.214747,78.097626';

try {
    $client = new Client(API_KEY);
    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = 1;
    $datetime_string = '2004-02-01T15:19:21Z';
    $bride_dob = new DateTime($datetime_string);
    $bride_location = new Location($latitude, $longitude);
    $bride_profile = new Profile($bride_location, $bride_dob);

    $latitude = 10.214747;
    $longitude = 78.097626;
    $datetime_string = '2019-01-01T15:19:21Z';
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


} catch (RateLimitExceededException $e) {
    echo "RateLimitExceededException \n\n";
} catch (QuotaExceededException $e) {
    echo "QuotaExceededException \n\n";
} catch (InvalidArgumentException $e) {
    echo "InvalidArgumentException \n\n";
} catch (\Exception $e) {
    echo "Exception  \n\n";
}


/**
 * Horoscope Matching/Dasha Porutham/Dasha Koot details
 * (It is the south indian match making method)
 *
 * System should be either kerala/tamil
 * ayanamsa is always 1
 * dob should be in ISO 8601 format
 * coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
 **/

try {
    $client = new Client( API_KEY );
    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = 1;
    $system = "kerala";
    $datetime_string = '2004-02-01T15:19:21Z';
    $bride_dob = new DateTime( $datetime_string );
    $bride_location = new Location( $latitude, $longitude );
    $bride_profile = new Profile( $bride_location, $bride_dob );

    $latitude = 10.214747;
    $longitude = 78.097626;
    $datetime_string = '2019-01-01T15:19:21Z';
    $groom_dob = new DateTime( $datetime_string );
    $groom_location = new Location( $latitude, $longitude );
    $groom_profile = new Profile( $groom_location, $groom_dob );

    $horoscope_match_service = new HoroscopeMatch( $client );

    $horoscope_match = $horoscope_match_service->process( $bride_profile, $groom_profile, $system );

    print_r( $horoscope_match->getInput() );
    
    $horoscope_match_result = $horoscope_match->getResult();
    
    print_r( $horoscope_match_result );
    
    print_r( $horoscope_match_result->bridegroom_details );
    
    print_r( $horoscope_match_result->bridegroom_details->nakshatra_details->getName() );
    
    print_r( "\n\n" . $horoscope_match_result->papa_samaya_result->papa_status );
    
    print_r( "\n\n" . $horoscope_match_result->average_porutham );
    
    print_r( "\n\n" . $horoscope_match_result->compatibility );
    
    print_r( (array)$horoscope_match_result->detailed_information );


} catch (RateLimitExceededException $e) {
    echo "RateLimitExceededException \n\n";
} catch (QuotaExceededException $e) {
    echo "QuotaExceededException \n\n";
} catch (InvalidArgumentException $e) {
    echo "InvalidArgumentException \n\n";
} catch (\Exception $e) {
    echo "Exception  \n\n";
}

