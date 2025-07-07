<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Api\Horoscope\Service;

use Prokerala\Api\Horoscope\Result\DailyHoroscopeAdvancedResponse;
use Prokerala\Api\Horoscope\Service\DailyPredictionAdvanced;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class DailyPredictionAdvancedTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\DailyPrediction::process
     */
    public function testProcess(): void
    {
        $service = new DailyPredictionAdvanced($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $datetime = new \DateTimeImmutable('now', $tz);
        $result = $service->process($datetime, 'aries', 'general');

        $this->assertInstanceOf(DailyHoroscopeAdvancedResponse::class, $result);
    }
}
