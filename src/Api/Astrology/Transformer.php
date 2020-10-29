<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology;

use Prokerala\Api\Astrology\Exception\Result\Transformer\Exception;
use Prokerala\Api\Astrology\Exception\Result\Transformer\ParameterMismatchException;
use Prokerala\Api\Astrology\Exception\Result\Transformer\ParameterTypeMissingException;
use Prokerala\Api\Astrology\Exception\Result\Transformer\ParameterValueMissingException;
use Prokerala\Api\Astrology\Result\ResultInterface;
use ReflectionClass;
use ReflectionMethod;
use RuntimeException;

/**
 * @template T of ResultInterface
 */
class Transformer
{
    /**
     * @var callable[]
     * @psalm-var array<"string"|"int",array<class-string,callable>>
     */
    private $paramConverters = [];

    /**
     * @var class-string
     * @psalm-var class-string $class
     */
    private $class;

    /**
     * @param class-string $class
     * @psalm-param class-string of T
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * @param "string"|"int" $from
     * @param class-string   $to
     * @param callable       $converter
     *
     * @return void
     */
    public function setParamConverter($from, $to, $converter)
    {
        if (null === $converter) {
            unset($this->paramConverters[$from][$to]);

            return;
        }

        $this->paramConverters[$from][$to] = $converter;
    }

    /**
     * @return object
     * @psalm-return T
     */
    public function transform(\stdClass $data)
    {
        /** @var ResultInterface $result */
        $result = $this->create($this->class, $data);
        $result->setRawResponse($data);

        return $result;
    }

    /**
     * @param string    $class
     * @param \stdClass $data
     *
     * @return object
     * @pslam-param class-string of C $class
     * @psalm-return C
     */
    private function create($className, $data)
    {
        if (!$data instanceof \stdClass) {
            throw new RuntimeException('Cannot create object from '.\gettype($data));
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
                return '_'.lcfirst($match[0]);
            }, $paramName);

            $paramValue = null;
            if (property_exists($data, $dataKey)) {
                $paramValue = $data->{$dataKey};
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
                $arguments[] = $this->parseParameter($paramValue, $dataType, $paramType);
            } catch (ParameterMismatchException $e) {
                throw new Exception("Failed to parse {$className}::{$paramName} - ".$e->getMessage());
            }
        }

        return $class->newInstanceArgs($arguments);
    }

    /**
     * @param ReflectionMethod $docComment
     * @param string           $namespace
     *
     * @return array
     */
    private function parsePhpDoc(ReflectionMethod $method, $namespace)
    {
        $phpDoc = $method->getDocComment() ?: '';

        preg_match_all('/^\s+\* @param\s+([a-zA-Z\\\[\]|]+)\s+\$([a-zA-Z]+)/m', $phpDoc, $matches, PREG_SET_ORDER);
        $scalarTypes = [
            'int' => 'integer',
            'bool' => 'boolean',
            'string' => 'string',
            'float' => 'double',
            'null' => 'NULL',
        ];

        $resolvedArgTypes = [];
        foreach ($matches as $match) {
            $resolvedTypes = [];
            $types = explode('|', $match[1]);
            foreach ($types as $type) {
                $isArray = '[]' === substr($type, -2);
                if ($isArray) {
                    $type = substr($type, 0, -2);
                }
                if (isset($scalarTypes[$type])) {
                    $resolvedTypes[] = $scalarTypes[$type].($isArray ? '[]' : '');

                    continue;
                }

                if ('\\' !== $type[0]) {
                    $type = $namespace.'\\'.$type;
                } else {
                    $type = substr($type, 1);
                }
                $resolvedTypes[] = $type.($isArray ? '[]' : '');
            }

            $resolvedArgTypes[$match[2]] = $resolvedTypes;
        }

        return $resolvedArgTypes;
    }

    /**
     * @param mixed    $data       Data
     * @param string   $dataType   Data type
     * @param string[] $paramTypes Parameter type
     *
     * @throws ParameterMismatchException
     *
     * @return mixed
     */
    private function parseParameter($data, $dataType, $paramTypes)
    {
        $isEmptyArray = \is_array($data) && empty($data);
        // Hack for empty arrays, since we cannot determine the type of the array
        // without checking the member type
        $paramTypes = $isEmptyArray ? ['array'] : $paramTypes;

        // Detect the SDK parameter type from the response data type
        foreach ($paramTypes as $targetType) {
            if (isset($this->paramConverters[$dataType][$targetType])) {
                // Convert using configured transformer
                $transformer = $this->paramConverters[$dataType][$targetType];

                return $transformer($data);
            }
        }

        if (null === $data || is_scalar($data) || $isEmptyArray || (\is_array($data) && is_scalar($data[0]))) {
            if (null === $dataType) {
                throw new ParameterMismatchException('Unexpected parameter type');
            }

            return $data;
        }

        if ($data instanceof \stdClass) {
            return $this->create($paramTypes[0], $data);
        }

        $paramValue = [];
        foreach ($data as $val) {
            \assert($val instanceof \stdClass);
            $paramValue[] = $this->create(substr($paramTypes[0], 0, -2), $val);
        }

        return $paramValue;
    }

    private function getType($val)
    {
        if (null === $val) {
            return 'NULL';
        }

        if (\is_array($val)) {
            return empty($val) ? 'array' : $this->getType($val[0]).'[]';
        }

        return \gettype($val);
    }
}
