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

use Prokerala\Api\Numerology\Result\Pythagorean\Bridge as BridgeResult;
use Prokerala\Api\Numerology\Service\Pythagorean\BridgeNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Numerology\Service\Pythagorean\BridgeNumber
 */
final class BridgeNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Pythagorean\BridgeNumber::process
     */
    public function testProcess(): void
    {
        $service = new BridgeNumber($this->getClient());

        $datetime = new \DateTimeImmutable();
        $firstName = 'John';
        $middleName = '';
        $lastName = 'Doe';

        $result = $service->process($datetime, $firstName, $middleName, $lastName);

        $this->assertInstanceOf(BridgeResult::class, $result);
    }
}
