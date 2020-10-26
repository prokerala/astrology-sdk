<?php

namespace Prokerala\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

/**
 * @internal
 * @coversNothing
 */
class BaseTestCase extends TestCase
{
    /**
     * @param string $class
     * @param string $method
     * @return ReflectionMethod
     * @throws ReflectionException
     */
    protected function getPrivateMethod($class, $method)
    {
        $class = new ReflectionClass($class);
        $method = $class->getMethod($method);
        $method->setAccessible(true);

        return $method;
    }
}
