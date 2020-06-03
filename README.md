# Getting Started with Prokerala Astrology API

This API integration guide will help you get started with your astrology website or mobile app in no time. [Prokerala API](https://api.prokerala.com) integration helps you generate custom [horoscope](https://www.prokerala.com/astrology/birth-chart/), perform [horoscope matching](https://www.prokerala.com/astrology/kundali-matching/), check [mangal dosha](https://www.prokerala.com/astrology/mangal-dosha/manglik.php), [panchang](https://www.prokerala.com/astrology/panchang/) and much more.

## Requirements

PHP needs to be a minimum version of PHP 5.6.0.

## Installation

If your project uses composer, run the below command

```

composer require prokerala/astrology-sdk

```


If you are not using composer, download the latest release from the releases section. You should download the zip file. After that include autoload.php in your application and you can use the API as usual.

## Usage



### Panchang details
Ayanamsa can be Lahiri, Raman or KP. (Default ayanamsa is Lahiri)
eg : Ayanamsa::LAHIRI, Ayanamsa::RAMAN, Ayanamsa::KP

Datetime should be in ISO 8601 format

Coordinates should be valid latitude and longitude eg : `10.214747,78.097626`

```

<?php
include '../vendor/autoload.php';

use Prokerala\Common\Api\Client;
use Prokerala\Api\Token;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Ayanamsa;
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

const API_KEY = 'YOUR_API_KEY_HERE';

try {
  
    $latitude = 10.214747;
    $longitude = 78.097626;
    $datetime_string = '2004-02-01T15:19:21Z';
    $datetime = new DateTime($datetime_string);

    $client = new Client(API_KEY);
    $location = new Location($latitude, $longitude);
    $panchang = new Panchang($client);
    

    /**
    * If you want to use different ayanamsa, use the setAyanamsa() method.
    * Default ayanamsa is Lahiri
    */

    $panchang->setAyanamsa(Ayanamsa::RAMAN);

    $result = $panchang->process($location, $datetime);
    print_r($result->getTithi());
    print_r($result->getNakshatra());
    print_r($result->getKarana());
    print_r($result->getVasara());
    print_r($result->getYoga());

    $tithi = $result->getTithi()[0];
    print_r($tithi->getStartTime());
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

```


### Planet Positions details
Ayanamsa can be Lahiri, Raman or KP. (Default ayanamsa is Lahiri)
eg : Ayanamsa::LAHIRI, Ayanamsa::RAMAN, Ayanamsa::KP

Datetime should be in ISO 8601 format

Coordinates should be valid latitude and longitude eg : `10.214747,78.097626`

```
try {
    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = Ayanamsa::LAHIRI;
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
```



### Manglik/Mangal Dosha details
Ayanamsa can be Lahiri, Raman or KP. (Default ayanamsa is Lahiri)
eg : Ayanamsa::LAHIRI, Ayanamsa::RAMAN, Ayanamsa::KP

Datetime should be in ISO 8601 format

Coordinates should be valid latitude and longitude eg : `10.214747,78.097626`

```
try {

    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = Ayanamsa::LAHIRI;
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
```


### Kundali Matching/Gun Milan/Ashta Koot details
(It is the north indian match making method)
 
Ayanamsa can be Lahiri, Raman or KP. (Default ayanamsa is Lahiri)
eg : Ayanamsa::LAHIRI, Ayanamsa::RAMAN, Ayanamsa::KP

Dob/Datetime should be ISO 8601 format

Coordinates should be valid latitude and longitude eg : `10.214747,78.097626`

```
$bride_dob = '2004-02-12T15:19:21+00:00';
$bride_coordinates = '10.214747,78.097626';
$groom_dob = '2004-02-12T15:19:21+00:00';
$groom_coordinates = '10.214747,78.097626';

try {
    $client = new Client(API_KEY);
    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = Ayanamsa::LAHIRI;
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
    
```

### Horoscope Matching/Dasha Porutham/Dasha Koot details
    (It is the south indian match making method)

System is either kerala/tamil

Ayanamsa can be Lahiri, Raman or KP. (Default ayanamsa is Lahiri)
eg : Ayanamsa::LAHIRI, Ayanamsa::RAMAN, Ayanamsa::KP

Dob/Datetime should be in ISO 8601 format

Coordinates should be valid latitude and longitude eg : `10.214747,78.097626`

```
try {
    $client = new Client(API_KEY);
    $latitude = 10.214747;
    $longitude = 78.097626;
    $ayanamsa = Ayanamsa::LAHIRI;
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
    

```

### Nakshatra Porutham

(Nakshatras Numbered from Aswini to Revathi as 1 - 27, If nakshatra have pada should be numbered as nakshatra-pada format eg: Krithika - 1st Pada as 3-1 ...)

bride and groom stars should be a valid number format eg : `21-3` or 20 


```
try {
    $client = new Client( API_KEY );
    $lang = 'en';
    $bride_star = 2;
    $groom_star = '21-2';

    $nakshatra_match_service = new NakshatraPorutham( $client );

    $nakshatra_match = $nakshatra_match_service->process( $bride_star, $groom_star, $lang );

    print_r( $nakshatra_match->getInput() );

    $nakshatra_match_result = $nakshatra_match->getResult();

    print_r( $nakshatra_match_result );

    print_r( $nakshatra_match_result->result );

    print_r( $nakshatra_match_result->result->dina );

    print_r( $nakshatra_match_result->porutham_details );

    print_r( $nakshatra_match_result->nakshatras_details);


} catch (RateLimitExceededException $e) {
    echo "RateLimitExceededException \n\n";
} catch (QuotaExceededException $e) {
    echo "QuotaExceededException \n\n";
} catch (InvalidArgumentException $e) {
    echo "InvalidArgumentException \n\n";
} catch (\Exception $e) {
    echo "Exception \n\n";
}
```


For further help, Please visit our documentation at  https://api.prokerala.com/docs/

## License

Copyright &commat; [Prokerala.com](https://www.prokerala.com). The Prokerala [Astrology](https://www.prokerala.com/astrology/) API PHP SDK is released under the [MIT License](https://github.com/prokerala/astrology-sdk/blob/master/LICENSE).
