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

/**
 * @template T of ResultInterface
 */
final class Transformer
{
    /**
     * @var callable[]
     * @psalm-var array<"string"|"int",array<class-string,callable>>
     */
    private array $paramConverters = [];

    /**
     * @var class-string<T>
     */
    private string $class;

    /**
     * @param class-string<T> $class
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * @param "int"|"string" $from
     * @param class-string   $to
     */
    public function setParamConverter($from, $to, ?callable $converter): void
    {
        if (null === $converter) {
            unset($this->paramConverters[$from][$to]);

            return;
        }

        $this->paramConverters[$from][$to] = $converter;
    }

    /**
     * @return T
     */
    public function transform(\stdClass $data)
    {
        $result = $this->create($this->class, $data);
        $result->setRawResponse($data);

        return $result;
    }

    /**
     * @template C of object
     * @param class-string<C> $className
     *
     * @return object
     * @return C
     */
    private function create($className, \stdClass $data)
    {
        if (!$data instanceof \stdClass) {
            throw new \RuntimeException('Cannot create object from ' . \gettype($data));
        }

        $class = new \ReflectionClass($className);
        if (!$class->isInstantiable()) {
            throw new \RuntimeException("{$className} is not instantiable");
        }

        $constructor = $class->getConstructor();
        if (null === $constructor) {
            throw new \RuntimeException("{$className} is not instantiable");
        }
        $params = $constructor->getParameters();

        if (!$params) {
            // Constructor takes no argument
            return $class->newInstance();
        }

        $paramTypes = $this->parsePhpDoc($constructor, $class->getNamespaceName());

        $arguments = [];
        foreach ($params as $param) {
            $paramName = $param->getName();
            $dataKey = preg_replace_callback('/[A-Z]/', fn ($match) => '_' . lcfirst($match[0]), $paramName) ?? $paramName;

            $paramValue = null;
            if (property_exists($data, $dataKey)) {
                $paramValue = $data->{$dataKey};
            } elseif ($param->isDefaultValueAvailable()) {
                $paramValue = $param->getDefaultValue();
            } else {
                throw new ParameterValueMissingException("Parameter {$className}::{$paramName} is missing");
            }


            $dataType = $this->getType($paramValue);

            /** @var null|\ReflectionNamedType $reflectionType */
            $reflectionType = $param->getType();

            if (null !== $reflectionType && (!$reflectionType->isBuiltin() || 'array' !== $reflectionType->getName())) {
                $paramType = $reflectionType->allowsNull() ? ['null', $reflectionType->getName()] : [$reflectionType->getName()];
            } elseif (isset($paramTypes[$paramName])) {
                $paramType = $paramTypes[$paramName];
            } else {
                throw new ParameterTypeMissingException("Parameter type for {$className}::{$paramName} is not specified");
            }

            try {
                $arguments[] = $this->parseParameter($paramValue, $dataType, $paramType);
            } catch (ParameterMismatchException $e) {
                throw new Exception("Failed to parse {$className}::{$paramName} - " . $e->getMessage());
            }
        }

        return $class->newInstanceArgs($arguments);
    }

    /**
     * @return array<string, list<string>>
     */
    private function parsePhpDoc(\ReflectionMethod $method, string $namespace): array
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
                    $resolvedTypes[] = $scalarTypes[$type] . ($isArray ? '[]' : '');

                    continue;
                }

                if ('\\' !== $type[0]) {
                    $type = $namespace . '\\' . $type;
                } else {
                    $type = substr($type, 1);
                }
                $resolvedTypes[] = $type . ($isArray ? '[]' : '');
            }

            $resolvedArgTypes[$match[2]] = $resolvedTypes;
        }

        return $resolvedArgTypes;
    }

    /**
     * @param mixed       $data       Data
     * @param null|string $dataType   Data type
     * @param string[]    $paramTypes Parameter type
     *
     * @return mixed
     * @throws ParameterMismatchException
     */
    private function parseParameter($data, ?string $dataType, array $paramTypes)
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

        if (null === $data || \is_scalar($data) || $isEmptyArray || (\is_array($data) && \is_scalar($data[0]))) {
            if (null === $dataType) {
                throw new ParameterMismatchException('Unexpected parameter type');
            }

            return $data;
        }

        if ($data instanceof \stdClass) {
            return $this->create($paramTypes[0], $data); // @phpstan-ignore-line
        }

        $paramValue = [];
        \assert(\is_array($data));
        foreach ($data as $val) {
            \assert($val instanceof \stdClass);
            $paramValue[] = $this->create(substr($paramTypes[0], 0, -2), $val); // @phpstan-ignore-line
        }

        return $paramValue;
    }

    /**
     * @param mixed $val
     */
    private function getType($val): string
    {
        if (null === $val) {
            return 'NULL';
        }

        if (\is_array($val)) {
            return empty($val) ? 'array' : $this->getType($val[0]) . '[]';
        }

        return \gettype($val);
    }
}
