<?php
declare(strict_types=1);

namespace Prokerala\Test\Api\Astrology\Service;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Service\SudharshanachakraChart;
use PHPUnit\Framework\TestCase;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;

/**
 * @internal
 * @covers \Prokerala\Api\Astrology\Service\SudharshanachakraChart
 */
final class SudarshanaChakraTest extends TestCase
{

    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\SudharshanachakraChart::process
     */
    public function testProcess(): void
    {
        $service = new SudharshanachakraChart($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $datetime = new \DateTimeImmutable('2000-01-01', $tz);
        $location = new Location(21.2, 78.1, 0, $tz);
        $la = 'en';
        $actual = $service->process($location, $datetime, $la);

        $this->assertIsString($actual);
    }
}
