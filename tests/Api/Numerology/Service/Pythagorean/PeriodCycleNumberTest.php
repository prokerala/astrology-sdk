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

use Prokerala\Api\Numerology\Result\Pythagorean\PeriodCycleNumberResult;
use Prokerala\Api\Numerology\Service\Pythagorean\PeriodCycleNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Numerology\Service\Pythagorean\PeriodCycleNumber
 */
final class PeriodCycleNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Pythagorean\PeriodCycleNumber::process
     */
    public function testProcess(): void
    {
        $service = new PeriodCycleNumber($this->getClient());

        $datetime = new \DateTimeImmutable();

        $result = $service->process($datetime);

        $this->assertInstanceOf(PeriodCycleNumberResult::class, $result);
    }
}
