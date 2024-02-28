<?php
declare(strict_types=1);

namespace Prokerala\Test\Api\Astrology\Western\Service\PlanetPositions;

use PHPUnit\Framework\TestCase;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Western\Result\PlanetPositions\CompositeChart as CompositeChartResult;
use Prokerala\Api\Astrology\Western\Service\PlanetPositions\CompositeChart;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;

/**
 * @internal
 * @covers \Prokerala\Api\Astrology\Western\Service\PlanetPositions\CompositeChart
 */
class CompositeChartTest extends TestCase
{

    use AuthenticationTrait;

    public function testProcess(): void
    {
        $tz = new \DateTimeZone('Asia/Kolkata');
        $primaryBirthTime = new \DateTimeImmutable('2000-01-01', $tz);
        $primaryBirthLocation = new Location(21.2, 78.1, 0, $tz);
        $secondaryBirthTime = new \DateTimeImmutable('1991-01-01', $tz);
        $secondaryBirthLocation = new Location(21.2, 78.1, 0, $tz);
        $currentLocation = new Location(21.2, 78.1, 0, $tz);
        $transitDateTime = new \DateTimeImmutable('2020-01-01', $tz);
        $houseSystem = 'placidus';
        $orb = 'default';
        $rectificationChart = 'flat-chart';

        $actual = (new CompositeChart($this->getClient()))->process(
            $primaryBirthLocation,
            $primaryBirthTime,
            $secondaryBirthLocation,
            $secondaryBirthTime,
            $currentLocation,
            $transitDateTime,
            $houseSystem,
            $orb,
            false,
            false,
            $rectificationChart,
        );

        $this->assertInstanceOf(CompositeChartResult::class, $actual);

    }
}
