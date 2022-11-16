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
use Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition as PlanetPositionResult;
use Prokerala\Api\Astrology\Service\PlanetPosition;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class PlanetPositionTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\PlanetPosition::process
     */
    public function testProcess(): void
    {
        $service = new PlanetPosition($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $datetime = new \DateTimeImmutable('2000-01-01', $tz);
        $location = new Location(21.2, 78.1, 0, $tz);
        $la = 'en';
        $result = $service->process($location, $datetime, null, $la);
        $this->assertInstanceOf(PlanetPositionResult::class, $result);

        $result = $service->process($location, $datetime, '1,2,3', $la);
        $this->assertInstanceOf(PlanetPositionResult::class, $result);
    }
}
