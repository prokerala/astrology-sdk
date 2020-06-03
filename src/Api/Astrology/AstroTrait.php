<?php
/**
 * (c) Vimal <api@api.prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Vimal <api@api.prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology-sdk
 */

namespace Prokerala\Api\Astrology;

use RuntimeException;

/**
 * Defines
 */
trait AstroTrait
{
    public $arClassNameMap = [
        'week_day' => 'Vasara',
        'nakshatra' => 'Nakshatra',
        'nakshatra_details' => 'Nakshatra',
        'tithi' => 'Tithi',
        'yoga' => 'Yoga',
        'karana' => 'Karana',
        'planet_positions' => 'Planet',
        'moon_rasi' => 'Zodiac',
        'rasi_details' => 'Zodiac',
    ];

    /**
     * Function returns the name
     *
     * @param  string $index          index value from response
     * @param  bool   $fullyQualified return fully qualified class name
     * @return string
     */
    public function getClassName($index, $fullyQualified = false)
    {
        if (!isset($this->arClassNameMap[$index])) {
            return null;
        }

        if ($fullyQualified) {
            return 'Prokerala\\Api\\Astrology\\Result\\' . $this->arClassNameMap[$index];
        }

        return $this->arClassNameMap[$index];
    }

    private function make($class, $data, \DateTimeZone $timezone = null)
    {
        $reflector = new \ReflectionClass($class);
        if (!$reflector->isInstantiable()) {
            throw new \RuntimeException("{$class} is not instantiable");
        }

        $constructor = $reflector->getConstructor();
        $params = null;
        if ($constructor) {
            $params = $constructor->getParameters();
        }

        if (!$params) {
            // Constructor takes no argument
            return $reflector->newInstance();
        }

        $args = [];
        foreach ($params as $param) {
            $args[] = $this->resolveParam($param, $data, $timezone);
        }

        return $reflector->newInstanceArgs($args);
    }

    /**
     * Resolve dependecy parameter
     *
     * @param ReflectionParameter $param
     */
    private function resolveParam($param, $data, $timezone)
    {
        $name = $param->getName();
        $param->isDefaultValueAvailable();

        if (!property_exists($data, $name)) {
            if (!$param->isDefaultValueAvailable()) {
                throw new \RuntimeException("Failed to resolve parameter '{$name}'");
            }

            return $param->getDefaultValue();
        }

        $value = $data->$name;
        $class = $param->getClass();

        if (!$class) {
            return $value;
        }

        if ($value instanceof \stdClass) {
            // Resolve constructor arguments by name from the stdObject
            return $this->make($class->getName(), $value, $timezone);
        }

        // Use the resolved value as first constructor argument
        $val = $class->newInstance($value);

        if ($timezone && $class->getName() === 'DateTimeImmutable') {
            // Update timezone to match input
            $val = $val->setTimezone($timezone);
        }

        return $val;
     }
}
