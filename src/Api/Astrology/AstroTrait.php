<?php
/**
 * (c) Vimal <api@api.prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @package  Astrology
 * @author   Vimal <api@api.prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @link     https://github.com/prokerala/astrology
 * @access   public
 **/
namespace Prokerala\Api\Astrology;

/**
 * Defines
 *
 **/

trait AstroTrait
{
    public $arClassNameMap = [
        'week_day' => 'Vasara',
        'nakshatra' => 'Nakshatra',
        'nakshatra_details' => 'Nakshatra',
        'tithi' => 'Tithi',
        'yoga' => 'Yoga',
        'karana' => 'Karna',
        'planet_positions' => 'Planet',
        'moon_rasi' => 'Zodiac',
        'rasi_details' => 'Zodiac',
    ];
    
    /**
     * Function returns the name
     *
     * @param  string $index index value from response
     * @param  boolean $fullyQualified return fully qualified class name
     * @return string 
     **/
    public function getClassName($index, $fullyQualified = false)
    {
        if (!isset($this->arClassNameMap[$index])) {
            return null;
        }

        if ($fullyQualified) {
            return "\\Prokerala\\Api\\Astrology\\Result\\" . $this->arClassNameMap[$index];
        }

        return $this->arClassNameMap[$index];
    }
}
