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
use Prokerala\Api\Astrology\Profile;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\AdvancedPorutham as AdvancedMatchResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham as BasicMatchResult;
use Prokerala\Api\Astrology\Service\Porutham;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class PoruthamTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\Porutham::process
     */
    public function testProcess(): void
    {
        $service = new Porutham($this->getClient());

        $tz = new \DateTimeZone('Asia/Kolkata');
        $location = new Location(21.2, 78.1, 0, $tz);
        $la = 'en';

        $girlDob = new \DateTimeImmutable('2000-01-01', $tz);
        $girlProfile = new Profile($location, $girlDob);
        $boyDob = new \DateTimeImmutable('1995-01-01', $tz);
        $boyProfile = new Profile($location, $boyDob);

        $result = $service->process($girlProfile, $boyProfile, 'tamil', false, $la);
        $this->assertInstanceOf(BasicMatchResult::class, $result);

        $result = $service->process($girlProfile, $boyProfile, 'kerala', true, $la);
        $this->assertInstanceOf(AdvancedMatchResult::class, $result);
    }
}
