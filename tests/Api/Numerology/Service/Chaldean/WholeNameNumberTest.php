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

use Prokerala\Api\Numerology\Result\Chaldean\WholeName;
use Prokerala\Api\Numerology\Service\Chaldean\WholeNameNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class WholeNameNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Chaldean\WholeNameNumber::process
     */
    public function testProcess(): void
    {
        $service = new WholeNameNumber($this->getClient());

        $firstName = 'John';
        $middleName = '';
        $lastName = 'Doe';

        $response = $service->process($firstName, $middleName, $lastName);

        $this->assertInstanceOf(WholeName::class, $response);
    }
}
