<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Test\Api\Calendar\Service;

use Prokerala\Api\Calendar\Result\CalendarDate as CalendarDateResult;
use Prokerala\Api\Calendar\Service\CalendarDate;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class CalendarDateTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\CalendarDate::process
     */
    public function testProcess(): void
    {
        $service = new CalendarDate($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $datetime = new \DateTimeImmutable('now', $tz);
        $la = 'en';
        $result = $service->process('purnimanta', $datetime, $la);

        $this->assertInstanceOf(CalendarDateResult::class, $result);
    }
}
