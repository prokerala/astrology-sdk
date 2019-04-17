# Getting Started with Prokerala Astrology API

This API integration guide will help you get started with your astrology website or mobile app in no time. Prokerala API integration helps you generate custom horoscope, perform horoscope matching, check mangal dosha and much more.

## Requirements

PHP needs to be a minimum version of PHP 5.6.0.

## Installation

If your project uses composer, run the below command

> composer require prokerala/astrology-api:1.*

If you are not using composer, download the latest release from the releases section. You should download the astrology-api.zip file. After that include autoload.php in your application and you can use the API as usual.

## Usage

```
<?php
include '../vendor/autoload.php';

use Prokerala\Astrology\Astro;

$astro = new Astro('YOUR_API_KEY_HERE');

/**
* To get Panchang details
* ayanamsa is always 1
* datetime should be ISO 8601 format
* coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
**/

$ayanamsa = 1;
$datetime = '2004-02-12T15:19:21+00:00';
$coordinates = '10.214747,78.097626';

$response = $astro->calculatePanchang($datetime, $coordinates, $ayanamsa);

/**
* To get Birth Chart details
* ayanamsa is always 1
* dob should be ISO 8601 format
* coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
**/
$ayanamsa = 1;
$dob = '2004-02-12T15:19:21+00:00';
$coordinates = '10.214747,78.097626';

$response = $astro->calculateBirthChart($dob, $coordinates, $ayanamsa);


/**
* To get Manglik/Mangal Dosha details
* ayanamsa is always 1
* dob should be ISO 8601 format
* coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
**/
$ayanamsa = 1;
$dob = '2004-02-12T15:19:21+00:00';
$coordinates = '10.214747,78.097626';

$response = $astro->calculateManglik($dob, $coordinates, $ayanamsa);

/**
* To get Kundali Matching/Gun Milan/Ashta Koot details
* (It is the north indian match making method)
* 
* ayanamsa is always 1
* dob should be ISO 8601 format
* coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
**/
$ayanamsa = 1;
$bride_dob = '2004-02-12T15:19:21+00:00';
$bride_coordinates = '10.214747,78.097626';
$bridegroom_dob = '2004-02-12T15:19:21+00:00';
$bridegroom_coordinates = '10.214747,78.097626';

$response = $astro->calculateKundaliMatching($bride_dob, $bridegroom_dob, $bride_coordinates, $bridegroom_coordinates, $ayanamsa);

/**
* To get Horoscope Matching/Dasha Porutham/Dasha Koot details
* (It is the south indian match making method)
*
* system is either kerala/tamil
* ayanamsa is always 1
* dob should be ISO 8601 format
* coordinates should be valid latitude and longitude eg : `10.214747,78.097626`
**/

$system = 'tamil';
$ayanamsa = 1;
$bride_dob = '2004-02-12T15:19:21+00:00';
$bride_coordinates = '10.214747,78.097626';
$bridegroom_dob = '2004-02-12T15:19:21+00:00';
$bridegroom_coordinates = '10.214747,78.097626';

$response = $astro->calculateHoroscopeMatching($system, $bride_dob, $bridegroom_dob, $bride_coordinates, $bridegroom_coordinates, $ayanamsa);

```
For further help, see our documentation on  https://api.prokerala.com/docs/

## License
The Prokerala Astrology API PHP SDK is released under the MIT License. See  [LICENSE](https://api.prokerala.com/license.txt) file for more details.

## About
prokerala-astrology-api-php is guided and supported by the Prokerala Developer Experience Team.

prokerala-astrology-api-php is maintained and funded by Ennexa Technologies, Pvt Ltd. The names and logos for prokerala-astrology-api-php are trademarks of  Technologies, Pvt Ltd.


