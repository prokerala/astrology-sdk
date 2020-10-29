<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

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
     *
     * @throws ReflectionException
     *
     * @return ReflectionMethod
     */
    protected function getPrivateMethod($class, $method)
    {
        $class = new ReflectionClass($class);
        $method = $class->getMethod($method);
        $method->setAccessible(true);

        return $method;
    }
}
