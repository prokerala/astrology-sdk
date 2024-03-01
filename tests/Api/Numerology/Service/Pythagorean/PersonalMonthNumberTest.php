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

use Prokerala\Api\Numerology\Result\Pythagorean\PersonalMonth;
use Prokerala\Api\Numerology\Service\Pythagorean\PersonalMonthNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Numerology\Service\Pythagorean\PersonalMonthNumber
 */
final class PersonalMonthNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Pythagorean\PersonalMonthNumber::process
     */
    public function testProcess(): void
    {
        $service = new PersonalMonthNumber($this->getClient());

        $datetime = new \DateTimeImmutable();

        $result = $service->process($datetime, 2000);

        $this->assertInstanceOf(PersonalMonth::class, $result);
    }
}
