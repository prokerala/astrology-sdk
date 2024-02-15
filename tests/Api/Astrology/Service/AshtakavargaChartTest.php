<?php
declare(strict_types=1);

namespace Prokerala\Test\Api\Astrology\Service;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Planet;
use Prokerala\Api\Astrology\Service\AshtakavargaChart;
use PHPUnit\Framework\TestCase;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;

/**
 * @internal
 * @covers \Prokerala\Api\Astrology\Service\AshtakavargaChart
 */
final class AshtakavargaChartTest extends TestCase
{

    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\AshtakavargaChart::process
     */
    public function testProcess(): void
    {
        $service = new AshtakavargaChart($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $datetime = new \DateTimeImmutable('2000-01-01', $tz);
        $location = new Location(21.2, 78.1, 0, $tz);
        $la = 'en';
        $chartStyle = 'north-indian';
        $planet = Planet::MOON;
        $actual = $service->process($location, $datetime, $planet, $chartStyle, $la);

        $this->assertIsString($actual);
    }
}
