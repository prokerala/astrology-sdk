<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Test\Api\Horoscope\Service;

use Prokerala\Api\Horoscope\Result\DailyHoroscope;
use Prokerala\Api\Horoscope\Service\DailyPrediction;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class DailyPredictionTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\DailyPrediction::process
     */
    public function testProcess(): void
    {
        $service = new DailyPrediction($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $datetime = new \DateTimeImmutable('now', $tz);
        $result = $service->process($datetime, 'aries');

        $this->assertInstanceOf(DailyHoroscope::class, $result);
    }
}
