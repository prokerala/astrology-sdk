<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Test\Api\Numerology\Service\Chaldean;

use Prokerala\Api\Numerology\Result\Chaldean\LifePath;
use Prokerala\Api\Numerology\Service\Chaldean\LifePathNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class LifePathNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Chaldean\LifePathNumber::process
     */
    public function testProcess(): void
    {
        $service = new LifePathNumber($this->getClient());

        $datetime = new \DateTimeImmutable();

        $response = $service->process($datetime);

        $this->assertInstanceOf(LifePath::class, $response);
    }
}
