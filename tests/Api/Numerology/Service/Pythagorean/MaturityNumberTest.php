<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Test\Api\Numerology\Service\Pythagorean;

use Prokerala\Api\Numerology\Result\Pythagorean\Maturity;
use Prokerala\Api\Numerology\Service\Pythagorean\MaturityNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Numerology\Service\Pythagorean\MaturityNumber
 */
final class MaturityNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Pythagorean\MaturityNumber::process
     */
    public function testProcess(): void
    {
        $service = new MaturityNumber($this->getClient());

        $datetime = new \DateTimeImmutable();
        $firstName = 'John';
        $middleName = '';
        $lastName = 'Doe';

        $result = $service->process($datetime, $firstName, $middleName, $lastName);

        $this->assertInstanceOf(Maturity::class, $result);
    }
}
