<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Test\Api\Astrology\Western\Service\AspectCharts;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Western\Elements\HouseSystem;
use Prokerala\Api\Astrology\Western\Service\AspectCharts\CompositeChart;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Astrology\Western\Service\AspectCharts\CompositeChart
 */
final class CompositeChartTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\CompositeChart::process
     */
    public function testProcess(): void
    {
        $service = new CompositeChart($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $primaryBirthTime = new \DateTimeImmutable('2000-01-01', $tz);
        $primaryBirthLocation = new Location(21.2, 78.1, 0, $tz);

        $secondaryBirthTime = new \DateTimeImmutable('2000-01-01', $tz);
        $secondaryBirthLocation = new Location(21.2, 78.1, 0, $tz);
        $currentLocation = new Location(21.2, 78.1, 0, $tz);

        $transitDateTime = new \DateTimeImmutable('2000-01-01', $tz);
        $houseSystem = HouseSystem::PLACIDUS;
        $orb = 'default';
        $rectificationChart = 'flat-chart';
        $aspectFilter = 'all';

        $result = $service->process(
            $primaryBirthLocation,
            $primaryBirthTime,
            $secondaryBirthLocation,
            $secondaryBirthTime,
            $currentLocation,
            $transitDateTime,
            $houseSystem,
            $orb,
            true,
            true,
            $rectificationChart,
            $aspectFilter
        );

        $this->assertIsString($result);
    }
}
