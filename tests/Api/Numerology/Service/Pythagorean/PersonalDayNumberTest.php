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

use Prokerala\Api\Numerology\Result\Pythagorean\PersonalDay;
use Prokerala\Api\Numerology\Service\Pythagorean\PersonalDayNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Numerology\Service\Pythagorean\PersonalDayNumber
 */
final class PersonalDayNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Pythagorean\PersonalDayNumber::process
     */
    public function testProcess(): void
    {
        $service = new PersonalDayNumber($this->getClient());

        $datetime = new \DateTimeImmutable();

        $result = $service->process($datetime, 2000);

        $this->assertInstanceOf(PersonalDay::class, $result);
    }
}
