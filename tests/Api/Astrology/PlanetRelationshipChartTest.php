<?php
declare(strict_types=1);

namespace Prokerala\Test\Api\Astrology;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Horoscope\PlanetRelationship\PlanetRelationshipResult;
use Prokerala\Api\Astrology\Service\PlanetRelationship;
use PHPUnit\Framework\TestCase;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;

/**
 * @internal
 * @covers \Prokerala\Api\Astrology\Service\PlanetRelationship
 */
final class PlanetRelationshipChartTest extends TestCase
{

    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\PlanetRelationship::process
     */
    public function testProcess(): void
    {
        $service = new PlanetRelationship($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $datetime = new \DateTimeImmutable('2000-01-01', $tz);
        $location = new Location(21.2, 78.1, 0, $tz);
        $la = 'en';
        $actual = $service->process($location, $datetime, $la);

        $this->assertInstanceOf(PlanetRelationshipResult::class, $actual);
    }
}
