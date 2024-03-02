<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Test\Api\Astrology\Western\Service\Charts;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Western\Elements\HouseSystem;
use Prokerala\Api\Astrology\Western\Service\Charts\TransitChart;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Astrology\Western\Service\Charts\TransitChart
 */
final class TransitChartTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\TransitChart::process
     */
    public function testProcess(): void
    {
        $service = new TransitChart($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $birthTime = new \DateTimeImmutable('2000-01-01', $tz);
        $location = new Location(21.2, 78.1, 0, $tz);
        $transitLocation = new Location(21.2, 78.1, 0, $tz);
        $transitDateTime = new \DateTimeImmutable('2002-01-01', $tz);

        $houseSystem = HouseSystem::PLACIDUS;
        $orb = 'default';
        $rectificationChart = 'flat-chart';
        $aspectFilter = 'all';

        $result = $service->process(
            $location,
            $birthTime,
            $transitLocation,
            $transitDateTime,
            $houseSystem,
            $orb,
            true,
            $rectificationChart,
            $aspectFilter
        );

        $this->assertIsString($result);
    }
}
