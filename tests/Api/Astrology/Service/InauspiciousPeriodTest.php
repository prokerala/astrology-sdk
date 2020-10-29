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
use Prokerala\Api\Astrology\Result\Panchang\InauspiciousPeriod as InauspiciousPeriodResult;
use Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat;
use Prokerala\Api\Astrology\Result\Panchang\Muhurat\Period;
use Prokerala\Api\Astrology\Service\InauspiciousPeriod;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
class InauspiciousPeriodTest extends BaseTestCase
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
                'id' => 4,
                'name' => 'Rahu',
                'type' => 'Inauspicious',
                'period' => [
                    [
                        'start' => '1967-08-29T15:46:42+05:30',
                        'end' => '1967-08-29T17:20:01+05:30',
                    ],
                ],
            ],
            [
                'id' => 5,
                'name' => 'Yamaganda',
                'type' => 'Inauspicious',
                'period' => [
                    [
                        'start' => '1967-08-29T09:33:23+05:30',
                        'end' => '1967-08-29T11:06:43+05:30',
                    ],
                ],
            ],
            [
                'id' => 6,
                'name' => 'Gulika',
                'type' => 'Inauspicious',
                'period' => [
                    [
                        'start' => '1967-08-29T12:40:02+05:30',
                        'end' => '1967-08-29T14:13:22+05:30',
                    ],
                ],
            ],
            [
                'id' => 7,
                'name' => 'Dur Muhurat',
                'type' => 'Inauspicious',
                'period' => [
                    [
                        'start' => '1967-08-29T08:56:02+05:30',
                        'end' => '1967-08-29T09:45:48+05:30',
                    ],
                    [
                        'start' => '1967-08-29T23:30:45+05:30',
                        'end' => '1967-08-30T00:16:59+05:30',
                    ],
                ],
            ],
            [
                'id' => 8,
                'name' => 'Varjyam',
                'type' => 'Inauspicious',
                'period' => [
                    [
                        'start' => '1967-08-29T17:37:15+05:30',
                        'end' => '1967-08-29T19:19:15+05:30',
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
        $method = new InauspiciousPeriod($client);
        $test_result = $method->process($location, $datetime);
        $result = self::EXPECTED_RESULT;
        $arMuhurat = [];
        $apiResponseMuhurat = [];
        foreach ($result['muhurat'] as $muhurat) {
            $periods = [];
            $apiResponsePeriod = [];
            foreach ($muhurat['period'] as $period) {
                $start = new DateTimeImmutable($period['start']);
                $end = new DateTimeImmutable($period['end']);
                $periods[] = new Period($start, $end);
                $apiResponsePeriod[] = (object) ['start' => $period['start'], 'end' => $period['end']];
            }
            $arMuhurat[] = new Muhurat($muhurat['id'], $muhurat['name'], $muhurat['type'], $periods);
            $apiResponseMuhurat['muhurat'][] = (object) ['id' => $muhurat['id'], 'name' => $muhurat['name'], 'type' => $muhurat['type'], 'period' => $apiResponsePeriod];
        }
        $expected_result = new InauspiciousPeriodResult($arMuhurat);
        $expected_result->setRawResponse((object) $apiResponseMuhurat);
        $this->assertEquals($expected_result, $test_result);
    }
}
