<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Tests\Api\Astrology\Service;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Horoscope\KaalSarpDosha as KaalSarpDoshaResult;
use Prokerala\Api\Astrology\Service\KaalSarpDosha;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
class KaalSarpDoshaTest extends BaseTestCase
{
    use AuthenticationTrait;

    public const INPUT = [
        'datetime' => '2020-05-12T09:20:00+05:30',
        'latitude' => '22.6757521',
        'longitude' => '88.0495418', // Kolkata
    ];

    public const EXPECTED_RESULT = [
        'type' => null,
        'dosha_type' => 'Kaal Amrita',
        'has_dosha' => true,
        'description' => 'You have Kal amrita yoga because all the planets are between Rahu and Ketu',
    ];

    public function testProcess()
    {
        $datetime = new \DateTimeImmutable(self::INPUT['datetime']);
        $tz = $datetime->getTimezone();
        $location = new Location(self::INPUT['latitude'], self::INPUT['longitude'], 0, $tz);
        $client = $this->setClient();
        $method = new KaalSarpDosha($client);
        $test_result = $method->process($location, $datetime);

        $result = self::EXPECTED_RESULT;
        $expected_result = new KaalSarpDoshaResult($result['type'], $result['dosha_type'], $result['has_dosha'], $result['description']);
        $expected_result->setRawResponse((object)$result);
        $this->assertEquals($expected_result, $test_result);
    }
}
