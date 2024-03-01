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

use Prokerala\Api\Numerology\Result\Pythagorean\PersonalYear;
use Prokerala\Api\Numerology\Service\Pythagorean\PersonalYearNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Numerology\Service\Pythagorean\PersonalYearNumber
 */
final class PersonalYearNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Pythagorean\PersonalYearNumber::process
     */
    public function testProcess(): void
    {
        $service = new PersonalYearNumber($this->getClient());

        $datetime = new \DateTimeImmutable();

        $result = $service->process($datetime, 2000);

        $this->assertInstanceOf(PersonalYear::class, $result);
    }
}
