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

use Prokerala\Api\Astrology\Exception\Result\Transformer\Exception;
use Prokerala\Api\Astrology\Exception\Result\Transformer\ParameterMismatchException;
use Prokerala\Api\Astrology\Exception\Result\Transformer\ParameterTypeMissingException;
use Prokerala\Api\Astrology\Exception\Result\Transformer\ParameterValueMissingException;
use ReflectionClass;
use ReflectionMethod;
use RuntimeException;

/**
 * Defines
 */
trait AstroTrait
{

    /**
     * @param class-string $className
     * @param \stdClass $data
     */
    private function make($className, $data)
    {

        if (!$data instanceof \stdClass) {
            throw new RuntimeException('Cannot make class from ' . gettype($data));
        }

        $class = new ReflectionClass($className);
        if (!$class->isInstantiable()) {
            throw new RuntimeException("{$className} is not instantiable");
        }

        $constructor = $class->getConstructor();
        $params = null;
        if ($constructor) {
            $params = $constructor->getParameters();
        }

        if (!$params) {
            // Constructor takes no argument
            return $class->newInstance();
        }

        $paramTypes = $this->parsePhpDoc($constructor, $class->getNamespaceName());

        $arguments = [];
        foreach ($params as $param) {
            $paramName = $param->getName();
            $dataKey = preg_replace_callback('/[A-Z]/', function ($match) {
                return '_' . lcfirst($match[0]);
            }, $paramName);


            $paramValue = null;
            if (isset($data->$dataKey)) {
                $paramValue = $data->$dataKey;
            } elseif ($param->isDefaultValueAvailable()) {
                $paramValue = $param->getDefaultValue();
            } else {
                throw new ParameterValueMissingException("Parameter {$className}::{$paramName} is missing");
            }

            $dataType = $this->getType($paramValue);
            $paramClass = $param->getClass();

            if ($paramClass) {
                $paramType = [$paramClass->getName()];
            } elseif (isset($paramTypes[$paramName])) {
                $paramType = $paramTypes[$paramName];
            } else {
                throw new ParameterTypeMissingException("Parameter type for {$className}::{$paramName} is not specified");
            }

            try {
                $arguments[] = $this->parseParameter($dataType, $paramValue, $paramType);
            } catch (ParameterMismatchException $e) {
                throw new Exception("Failed to parse {$className}::{$paramName} - " . $e->getMessage());
            }
        }

        return $class->newInstanceArgs($arguments);
    }

    /**
     * @param ReflectionMethod $docComment
     * @param string $namespace
     * @return array
     */
    private function parsePhpDoc(ReflectionMethod $method, $namespace)
    {
        $phpDoc = $method->getDocComment() ?: '';


        preg_match_all('/^\s+\* @param ([a-zA-Z\\_|\[\]]+)\s+\$([a-zA-Z]+)/m', $phpDoc, $matches, PREG_SET_ORDER);

        $scalarTypes = [
            'int' => 'integer',
            'bool' => 'boolean',
            'string' => 'string',
            'float' => 'float',
            'null' => 'NULL',
        ];

        $resolvedArgTypes = [];
        foreach ($matches as $match) {
            $resolvedTypes = [];
            $types = explode('|', $match[1]);
            foreach ($types as $type) {
                $isArray = substr($type, -2) === '[]';
                if ($isArray) {
                    $type = substr($type, 0, -2);
                }
                if (isset($scalarTypes[$type])) {
                    $resolvedTypes[] = $scalarTypes[$type] . ($isArray ? '[]' : '');
                    continue;
                }

                if ($type[0] !== '\\') {
                    $type = $namespace . '\\' . $type;
                }
                $resolvedTypes[] = $type . ($isArray ? '[]' : '');
            }

            $resolvedArgTypes[$match[2]] = $resolvedTypes;
        }

        return $resolvedArgTypes;
    }

    /**
     * @param string $dataType
     * @param mixed $data
     * @param string[] $types
     * @return mixed
     * @throws ParameterMismatchException
     */
    private function parseParameter($dataType, $data, $types)
    {
        if (is_null($data) || is_scalar($data) || (is_array($data) && is_scalar($data[0]))) {
            if (!in_array($dataType, $types)) {
                throw new ParameterMismatchException("Unexpected parameter type");
            }

            return $data;
        }

        if ($data instanceof \stdClass) {
            return $this->make($types[0], $data);
        }

        $paramValue = [];
        foreach ($data as $val) {
            assert($val instanceof \stdClass);
            $paramValue[] = $this->make(substr($types[0], 0, -2), $val);
        }

        return $paramValue;
    }

    private function getType($val)
    {
        if (is_null($val)) {
            return null;
        }

        if (is_array($val)) {
            return $this->getType($val[0]) . '[]';
        }

        return gettype($val);
    }

}
