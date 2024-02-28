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
use Prokerala\Api\Astrology\Western\Service\AspectCharts\NatalChart;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Astrology\Western\Service\AspectCharts\NatalChart
 */
final class NatalChartTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\NatalChart::process
     */
    public function testProcess(): void
    {
        $service = new NatalChart($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $birthTime = new \DateTimeImmutable('2000-01-01', $tz);
        $birthLocation = new Location(21.2, 78.1, 0, $tz);

        $houseSystem = HouseSystem::PLACIDUS;
        $orb = 'default';
        $aspectFilter = 'all';

        $result = $service->process(
            $birthLocation,
            $birthTime,
            $houseSystem,
            $orb,
            true,
            'flat-chart',
            $aspectFilter
        );

        $this->assertIsString($result);
    }
}
