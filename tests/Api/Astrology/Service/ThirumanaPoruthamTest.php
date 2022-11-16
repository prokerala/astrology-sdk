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

use Prokerala\Api\Astrology\NakshatraProfile;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\AdvancedThirumanaPorutham as AdvancedPorutham;
use Prokerala\Api\Astrology\Service\ThirumanaPorutham;
use Prokerala\Test\Api\Common\Traits\AuthenticationTrait;
use Prokerala\Test\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class ThirumanaPoruthamTest extends BaseTestCase
{
    use AuthenticationTrait;

    /**
     * @covers \Prokerala\Api\Astrology\Service\ThirumanaPorutham::process
     */
    public function testProcess(): void
    {
        $service = new ThirumanaPorutham($this->getClient());

        $la = 'en';
        $girlProfile = new NakshatraProfile(1, 2);
        $boyProfile = new NakshatraProfile(3, 4);

        $result = $service->process($girlProfile, $boyProfile, true, $la);

        $this->assertInstanceOf(AdvancedPorutham::class, $result);
    }
}
