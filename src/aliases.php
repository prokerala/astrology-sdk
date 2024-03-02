<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\Astagavarga {
    if (class_exists('Prokerala\\Api\\Astrology\\Result\\Horoscope\\Astagavarga\\AshtakavargaChartHouse', false)) {
        // Prevent error with preloading in PHP 7.4
        return;
    }

    function addAlias()
    {
        $oldNamespace = 'Prokerala\\Api\\Astrology\\Result\\Horoscope\\Astagavarga';
        $newNamespace = 'Prokerala\\Api\\Astrology\\Result\\Horoscope\\Ashtakavarga';

        $classMap = [
            'AshtakavargaChartHouse',
            'AshtakavargaChartHousePlanet',
            'AshtakavargaPlanet',
            'AshtakavargaPlanetResult',
            'AshtakavargaRasiResult',
            'AshtakavargaResult',
            'Sarvashtakavarga',
            'SarvashtakavargaResult',
        ];

        foreach ($classMap as $class) {
            class_alias("{$newNamespace}\\{$class}", "{$oldNamespace}\\{$class}");
        }
    }
    addAlias();
    class_alias(
        "Prokerala\\Api\\Astrology\\Result\\Element\\Bhava",
        "Prokerala\\Api\\Astrology\\Result\\Horoscope\\Astagavarga\\Bhava"
    );

    /** @phpstan-ignore-next-line */
    if (\false) {
        class AshtakavargaChartHouse extends \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaChartHouse
        {
        }

        class AshtakavargaChartHousePlanet extends \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaChartHousePlanet
        {
        }

        class AshtakavargaPlanet extends \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaPlanet
        {
        }

        class AshtakavargaPlanetResult extends \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaPlanetResult
        {
        }

        class AshtakavargaRasiResult extends \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaRasiResult
        {
        }

        class AshtakavargaResult extends \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaResult
        {
        }

        class Bhava extends \Prokerala\Api\Astrology\Result\Element\Bhava
        {
        }

        class Sarvashtakavarga extends \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\Sarvashtakavarga
        {
        }

        class SarvashtakavargaResult extends \Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\SarvashtakavargaResult
        {
        }
    }
}
