<?php
/**
 * (c) Ennexa <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @package  Astrology
 * @author   Ennexa <api@prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @link     https://github.com/prokerala/astrology
 * @access   public
 **/
namespace Prokerala\Api\Astrology;

/**
 * Defines Ayanamsa
 *
 **/
class Ayanamsa
{
    const LAHIRI = 1;
    const RAMAN = 3;
    const KP = 5;
   
    /**
     * Function returns the latitude
     *
     * @return float 
     **/
    public function showAll() 
    {
        return [
        	[
        		'name' => 'Lahiri',
        		'value' => self::LAHIRI,
        	],
        	[
        		'name' => 'Raman',
        		'value' => self::RAMAN,
        	],
        	[
        		'name' => 'KP',
        		'value' => self::KP,
        	]
        ];
    }
}