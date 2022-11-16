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

use Prokerala\Api\Numerology\Result\Chaldean\IdentityInitialCode as IdentityInitialCodeResult;
use Prokerala\Api\Numerology\Service\Chaldean\IdentityInitialCode;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class IdentityInitialCodeTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Chaldean\IdentityInitialCode::process
     */
    public function testProcess(): void
    {
        $service = new IdentityInitialCode($this->getClient());

        $firstName = 'John';
        $middleName = '';
        $lastName = 'Doe';

        $response = $service->process($firstName, $middleName, $lastName);

        $this->assertInstanceOf(IdentityInitialCodeResult::class, $response);
    }
}
