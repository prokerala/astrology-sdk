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
use Prokerala\Api\Astrology\Result\Panchang\GowriNallaNeram as GowriNallaNeramResult;
use Prokerala\Api\Astrology\Service\GowriNallaNeram;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @covers \Prokerala\Api\Astrology\Service\GowriNallaNeram
 */
final class GowriNallaNeramTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\GowriNallaNeram::process
     */
    public function testProcess(): void
    {
        $service = new GowriNallaNeram($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $datetime = new \DateTimeImmutable('2000-01-01', $tz);
        $location = new Location(21.2, 78.1, 0, $tz);
        $la = 'en';
        $result = $service->process($location, $datetime, $la);

        $this->assertInstanceOf(GowriNallaNeramResult::class, $result);
    }
}
