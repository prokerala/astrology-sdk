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

use Prokerala\Api\Numerology\Result\Pythagorean\LifeCycleNumber as LifeCycleNumberResult;
use Prokerala\Api\Numerology\Service\Pythagorean\LifeCycleNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class LifeCycleNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Pythagorean\LifeCycleNumber::process
     */
    public function testProcess(): void
    {
        $service = new LifeCycleNumber($this->getClient());

        $datetime = new \DateTimeImmutable();

        $result = $service->process($datetime);

        $this->assertInstanceOf(LifeCycleNumberResult::class, $result);
    }
}
