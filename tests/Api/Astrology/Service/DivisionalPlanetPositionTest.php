<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Test\Api\Astrology\Service;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Horoscope\DivisionalPlanetPosition as DivisionalPlanetPositionResult;
use Prokerala\Api\Astrology\Service\DivisionalPlanetPosition;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Astrology\Service\DivisionalPlanetPosition
 */
final class DivisionalPlanetPositionTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\DivisionalPlanetPosition::process
     */
    public function testProcess(): void
    {
        $service = new DivisionalPlanetPosition($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $datetime = new \DateTimeImmutable('2000-01-01', $tz);
        $location = new Location(21.2, 78.1, 0, $tz);
        $la = 'en';
        $chartType = 'lagna';
        $result = $service->process($location, $datetime, $chartType, $la);

        self::assertInstanceOf(DivisionalPlanetPositionResult::class, $result);
    }
}
