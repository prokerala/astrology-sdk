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

use Prokerala\Api\Numerology\Result\Pythagorean\LifePath;
use Prokerala\Api\Numerology\Service\Pythagorean\LifePathNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Numerology\Service\Pythagorean\LifePathNumber
 */
final class LifePathNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Pythagorean\LifePathNumber::process
     */
    public function testProcess(): void
    {
        $service = new LifePathNumber($this->getClient());

        $datetime = new \DateTimeImmutable();

        $result = $service->process($datetime);

        $this->assertInstanceOf(LifePath::class, $result);
    }
}
