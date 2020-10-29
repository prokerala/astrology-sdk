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

use DateTime;
use DateTimeImmutable;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Panchang\AuspiciousPeriod as AuspiciousPeriodResult;
use Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat;
use Prokerala\Api\Astrology\Result\Panchang\Muhurat\Period;
use Prokerala\Api\Astrology\Service\AuspiciousPeriod;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
final class AuspiciousPeriodTest extends BaseTestCase
{
    use AuthenticationTrait;

    const INPUT = [
        'datetime' => '1967-08-29T09:00:00+05:30',
        'latitude' => '19.0821978',
        'longitude' => '72.7411014', // Mumbai
    ];

    const EXPECTED_RESULT = [
        'muhurat' => [
            [
                'id' => 1,
                'name' => 'Abhijit Muhurat',
                'type' => 'Auspicious',
                'period' => [
                    [
                        'start' => '1967-08-29T12:15:06+05:30',
                        'end' => '1967-08-29T13:04:52+05:30',
                    ],
                ],
            ],
            [
                'id' => 2,
                'name' => 'Amrit Kaal',
                'type' => 'Auspicious',
                'period' => [
                    [
                        'start' => '1967-08-29T08:09:48+05:30',
                        'end' => '1967-08-29T09:54:45+05:30',
                    ],
                    [
                        'start' => '1967-08-30T03:50:15+05:30',
                        'end' => '1967-08-30T05:32:24+05:30',
                    ],
                ],
            ],
            [
                'id' => 3,
                'name' => 'Brahma Muhurat',
                'type' => 'Auspicious',
                'period' => [
                    [
                        'start' => '1967-08-29T04:50:30+05:30',
                        'end' => '1967-08-29T05:38:30+05:30',
                    ],
                ],
            ],
        ],
    ];

    public function testProcess()
    {
        $datetime = new DateTime(self::INPUT['datetime']);
        $tz = $datetime->getTimezone();
        $location = new Location(self::INPUT['latitude'], self::INPUT['longitude'], 0, $tz);
        $client = $this->setClient();

        $method = new AuspiciousPeriod($client);
        $test_result = $method->process($location, $datetime);
        $result = self::EXPECTED_RESULT;
        $arMuhurat = $apiResponseMuhurat = [];
        foreach ($result['muhurat'] as $muhurat) {
            $periods = $apiResponsePeriod = [];
            foreach ($muhurat['period'] as $period) {
                $start = new DateTimeImmutable($period['start']);
                $end = new DateTimeImmutable($period['end']);
                $periods[] = new Period($start, $end);
                $apiResponsePeriod[] = (object) ['start' => $period['start'], 'end' => $period['end']];
            }
            $arMuhurat[] = new Muhurat($muhurat['id'], $muhurat['name'], $muhurat['type'], $periods);
            $apiResponseMuhurat['muhurat'][] = (object) ['id' => $muhurat['id'], 'name' => $muhurat['name'], 'type' => $muhurat['type'], 'period' => $apiResponsePeriod];
        }
        $expected_result = new AuspiciousPeriodResult($arMuhurat);
        $expected_result->setRawResponse((object) $apiResponseMuhurat);
        $this->assertEquals($expected_result, $test_result);
    }
}
