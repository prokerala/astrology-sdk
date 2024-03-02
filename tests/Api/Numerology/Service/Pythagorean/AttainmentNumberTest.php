<?php

namespace Prokerala\Test\Api\Numerology\Service\Pythagorean;

use Prokerala\Api\Numerology\Result\Pythagorean\Attainment;
use Prokerala\Api\Numerology\Service\Pythagorean\AttainmentNumber;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Numerology\Service\Pythagorean\AttainmentNumber
 */
class AttainmentNumberTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Numerology\Service\Pythagorean\AttainmentNumber::process
     */
    public function testProcess(): void
    {
        $service = new AttainmentNumber($this->getClient());

        $datetime = new \DateTimeImmutable();
        $firstName = 'John';
        $middleName = '';
        $lastName = 'Doe';

        $response = $service->process($datetime, $firstName, $middleName, $lastName);

        $this->assertInstanceOf(Attainment::class, $response);
    }
}
