<?php
include '../vendor/autoload.php';


use Prokerala\Astrology\Astro;

use Prokerala\Common\Api\Client;
use Prokerala\Api\Token;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Service\Panchang;
use Prokerala\Api\Astrology\Service\HoroscopeMatch;
use Prokerala\Api\Astrology\Service\KundliMatch;
use Prokerala\Api\Astrology\Service\PlanetPosition;
use Prokerala\Api\Astrology\Service\MangalDosha;

use Prokerala\Common\Api\Exception\InvalidArgumentsException;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

const API_KEY = '2655c8dc12557b0246a9e39fb46a3390f9dc607d9104dee14bdef8d1baa4dbbd';


/**
* To get Panchang details
* ayanamsa is always 1
* datetime should be ISO 8601 format
* coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
**/

// try {
    
//     // $latitude = '1s0.214747';
//     $latitude = 10.214747;
//     $longitude = 78.097626;
//     $ayanamsa = 1;
//     $datetime_string = '2004-02-01T15:19:21Z';
//     $datetime = new DateTime($datetime_string);

//     $client = new Client(API_KEY);
//     $location = new Location($latitude, $longitude);
//     $panchang = new Panchang($client);

//     $result = $panchang->process($location, $datetime);
//     print_r($result);
//     print_r($result->getTithi());
//     $tithi = $result->getTithi()[0];
//     print_r("\n\n".$tithi->getStartTime());
//     print_r("\n\n".$tithi->getName());
//     print_r("\n\n".$result->getInput()->datetime);

// } catch (RateLimitExceededException $e) {
//     echo "Exception 1 \n\n";
//     print_r($e);
// } catch (QuotaExceededException $e) {
//     echo "Exception 2 \n\n";
//     print_r($e);
// } catch (InvalidArgumentException $e) {
//     echo "Exception 3 \n\n";
//     print_r($e);
// } catch (\Exception $e) {
//     echo "Exception 4 \n\n";
//     print_r($e);
// }

// exit;


/**
* To get Planet Positions details
* ayanamsa is always 1
* dob should be ISO 8601 format
* coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
**/

// try {
    
//     // $latitude = '1s0.214747';
//     $latitude = 10.214747;
//     $longitude = 78.097626;
//     $ayanamsa = 1;
//     $datetime_string = '2004-02-01T15:19:21Z';
//     $datetime = new DateTime($datetime_string);

//     $client = new Client(API_KEY);
//     $location = new Location($latitude, $longitude);
//     $planet_position = new PlanetPosition($client);

//     $planet_position_result = $planet_position->process($location, $datetime);
//     print_r($planet_position_result->getPlanets());
   
// } catch (RateLimitExceededException $e) {
//     echo "Exception 1 \n\n";
//     print_r($e);
// } catch (QuotaExceededException $e) {
//     echo "Exception 2 \n\n";
//     print_r($e);
// } catch (InvalidArgumentException $e) {
//     echo "Exception 3 \n\n";
//     print_r($e);
// } catch (\Exception $e) {
//     echo "Exception 4 \n\n";
//     print_r($e);
// }
    

// exit;

/**
* To get Manglik/Mangal Dosha details
* ayanamsa is always 1
* datetime should be ISO 8601 format
* coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
**/


// try {
    
//     // $latitude = '1s0.214747';
//     $latitude = 10.214747;
//     $longitude = 78.097626;
//     $ayanamsa = 1;
//     $datetime_string = '2004-02-01T15:19:21Z';
//     $datetime = new DateTime($datetime_string);

//     $client = new Client(API_KEY);
//     $location = new Location($latitude, $longitude);
//     $manglik_service = new MangalDosha($client);

//     $mangal_dosha = $manglik_service->process($location, $datetime);
//     print_r($mangal_dosha->getInput());
//     $mangal_dosha_result = $mangal_dosha->getResult();
//     print_r($mangal_dosha_result);
//     print_r($mangal_dosha_result->result->nakshatra);
//     print_r($mangal_dosha_result->result->nakshatra[0]->getName());

   
// } catch (RateLimitExceededException $e) {
//     echo "Exception 1 \n\n";
//     print_r($e);
// } catch (QuotaExceededException $e) {
//     echo "Exception 2 \n\n";
//     print_r($e);
// } catch (InvalidArgumentException $e) {
//     echo "Exception 3 \n\n";
//     print_r($e);
// } catch (\Exception $e) {
//     echo "Exception 4 \n\n";
//     print_r($e);
// }
    

// exit;


/**
* To get Kundali Matching/Gun Milan/Ashta Koot details
* (It is the north indian match making method)
* 
* ayanamsa is always 1
* dob/datetime should be ISO 8601 format
* coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
**/

// $ayanamsa = 1;
// $bride_dob = '2004-02-12T15:19:21+00:00';
// $bride_coordinates = '10.214747,78.097626';
// $groom_dob = '2004-02-12T15:19:21+00:00';
// $groom_coordinates = '10.214747,78.097626';

// try {
//     $client = new Client(API_KEY);
//     // $latitude = '1s0.214747';
//     $latitude = 10.214747;
//     $longitude = 78.097626;
//     $ayanamsa = 1;
//     $datetime_string = '2004-02-01T15:19:21Z';
//     $bride_dob = new DateTime($datetime_string);
//     $bride_location = new Location($latitude, $longitude);
//     $bride_profile = new Profile($bride_location, $bride_dob);

//     $latitude = 10.214747;
//     $longitude = 78.097626;
//     $datetime_string = '2019-01-01T15:19:21Z';
//     $groom_dob = new DateTime($datetime_string);
//     $groom_location = new Location($latitude, $longitude);
//     $groom_profile = new Profile($groom_location, $groom_dob);

//     $kundli_match_service = new KundliMatch($client);

//     $kundli_match = $kundli_match_service->process($bride_profile, $groom_profile);
    
//     print_r($kundli_match->getInput());
//     $kundli_match_result = $kundli_match->getResult();
//     print_r($kundli_match_result);
//     print_r($kundli_match_result->bridegroom_details);
//     print_r($kundli_match_result->bridegroom_details->nakshatra_details->getName());
//     print_r($kundli_match_result->result);


// } catch (RateLimitExceededException $e) {
//     print_r($e);
// } catch (QuotaExceededException $e) {
//     print_r($e);
// } catch (InvalidArgumentException $e) {
//     print_r($e);
// } catch (\Exception $e) {
//     print_r($e);
// }
    

// exit;

/**
* To get Horoscope Matching/Dasha Porutham/Dasha Koot details
* (It is the south indian match making method)
*
* system is either kerala/tamil
* ayanamsa is always 1
* dob should be ISO 8601 format
* coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
**/

try {
    $client = new Client(API_KEY);
    // $latitude = '1s0.214747';
    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = 1;
    $system = "kerala";
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

    $horoscope_match_service = new HoroscopeMatch($client);

    $horoscope_match = $horoscope_match_service->process($bride_profile, $groom_profile, $system);
    
    print_r($horoscope_match->getInput());
    $horoscope_match_result = $horoscope_match->getResult();
    print_r($horoscope_match_result);
    print_r($horoscope_match_result->bridegroom_details);
    print_r($horoscope_match_result->bridegroom_details->nakshatra_details->getName());
    print_r("\n\n".$horoscope_match_result->papa_samaya_result->papa_status);
    print_r("\n\n".$horoscope_match_result->average_porutham);
    print_r("\n\n".$horoscope_match_result->compatibility);
    print_r((array)$horoscope_match_result->detailed_information);


} catch (RateLimitExceededException $e) {
    print_r($e);
} catch (QuotaExceededException $e) {
    print_r($e);
} catch (InvalidArgumentException $e) {
    print_r($e);
} catch (\Exception $e) {
    print_r($e);
}
    

exit;