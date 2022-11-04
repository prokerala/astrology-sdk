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
use Prokerala\Api\Astrology\Result\Element\Planet;
use Prokerala\Api\Astrology\Result\EventTiming\Karana;
use Prokerala\Api\Astrology\Result\EventTiming\Nakshatra;
use Prokerala\Api\Astrology\Result\EventTiming\Tithi;
use Prokerala\Api\Astrology\Result\EventTiming\Yoga;
use Prokerala\Api\Astrology\Result\Panchang\AdvancedPanchang as AdvancedPanchangResult;
use Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat;
use Prokerala\Api\Astrology\Result\Panchang\Muhurat\Period;
use Prokerala\Api\Astrology\Result\Panchang\Panchang as BasicPanchangResult;
use Prokerala\Api\Astrology\Service\Panchang;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
class PanchangTest extends BaseTestCase
{
    use AuthenticationTrait;

    public const INPUT = [
        'datetime' => '2020-05-12T09:20:00+05:30',
        'latitude' => '22.6757521',
        'longitude' => '88.0495418', // Kolkata
    ];

    public const EXPECTED_RESULT = [
        'vaara' => 'Tuesday',
        'nakshatra' => [
            [
                'id' => 20,
                'name' => 'Uttara Ashadha',
                'lord' => [
                    'id' => 0,
                    'name' => 'Sun',
                    'vedic_name' => 'Ravi',
                ],
                'start' => '2020-05-12T04:10:22+05:30',
                'end' => '2020-05-13T04:54:26+05:30',
            ],
            [
                'id' => 21,
                'name' => 'Shravana',
                'lord' => [
                    'id' => 1,
                    'name' => 'Moon',
                    'vedic_name' => 'Chandra',
                ],
                'start' => '2020-05-13T04:54:27+05:30',
                'end' => '2020-05-14T06:23:13+05:30',
            ],
        ],
        'tithi' => [
            [
                'id' => 36,
                'index' => 0,
                'name' => 'Panchami',
                'paksha' => 'Krishna Paksha',
                'start' => '2020-05-11T06:35:30+05:30',
                'end' => '2020-05-12T05:53:32+05:30',
            ],
            [
                'id' => 37,
                'index' => 0,
                'name' => 'Shashthi',
                'paksha' => 'Krishna Paksha',
                'start' => '2020-05-12T05:53:33+05:30',
                'end' => '2020-05-13T05:59:42+05:30',
            ],
        ],
        'karana' => [
            [
                'index' => 0,
                'id' => 3,
                'name' => 'Taitila',
                'start' => '2020-05-11T18:08:30+05:30',
                'end' => '2020-05-12T05:53:32+05:30',
            ],
            [
                'index' => 0,
                'id' => 4,
                'name' => 'Garija',
                'start' => '2020-05-12T05:53:33+05:30',
                'end' => '2020-05-12T17:50:40+05:30',
            ],
            [
                'index' => 0,
                'id' => 5,
                'name' => 'Vanija',
                'start' => '2020-05-12T17:50:41+05:30',
                'end' => '2020-05-13T05:59:42+05:30',
            ],
        ],
        'yoga' => [
            [
                'id' => 22,
                'name' => 'Subha',
                'start' => '2020-05-12T02:41:29+05:30',
                'end' => '2020-05-13T01:38:39+05:30',
            ],
            [
                'id' => 23,
                'name' => 'Sukla',
                'start' => '2020-05-13T01:38:40+05:30',
                'end' => '2020-05-14T01:12:17+05:30',
            ],
        ],
        'sunrise' => '2020-05-12T05:02:37+05:30',
        'sunset' => '2020-05-12T18:05:58+05:30',
        'moonrise' => '2020-05-12T23:10:08+05:30',
        'moonset' => '2020-05-13T10:14:42+05:30',
        'auspicious_period' => [
            [
                'id' => 1,
                'name' => 'Abhijit Muhurat',
                'type' => 'Auspicious',
                'period' => [
                    [
                        'start' => '2020-05-12T11:08:08+05:30',
                        'end' => '2020-05-12T12:00:21+05:30',
                    ],
                ],
            ],
            [
                'id' => 2,
                'name' => 'Amrit Kaal',
                'type' => 'Auspicious',
                'period' => [
                    [
                        'start' => '2020-05-12T22:18:22+05:30',
                        'end' => '2020-05-12T23:57:18+05:30',
                    ],
                ],
            ],
            [
                'id' => 3,
                'name' => 'Brahma Muhurat',
                'type' => 'Auspicious',
                'period' => [
                    [
                        'start' => '2020-05-12T03:26:38+05:30',
                        'end' => '2020-05-12T04:14:37+05:30',
                    ],
                ],
            ],
        ],
        'inauspicious_period' => [
            [
                'id' => 4,
                'name' => 'Rahu',
                'type' => 'Inauspicious',
                'period' => [
                    [
                        'start' => '2020-05-12T14:50:08+05:30',
                        'end' => '2020-05-12T16:28:03+05:30',
                    ],
                ],
            ],
            [
                'id' => 5,
                'name' => 'Yamaganda',
                'type' => 'Inauspicious',
                'period' => [
                    [
                        'start' => '2020-05-12T08:18:27+05:30',
                        'end' => '2020-05-12T09:56:22+05:30',
                    ],
                ],
            ],
            [
                'id' => 6,
                'name' => 'Gulika',
                'type' => 'Inauspicious',
                'period' => [
                    [
                        'start' => '2020-05-12T11:34:17+05:30',
                        'end' => '2020-05-12T13:12:13+05:30',
                    ],
                ],
            ],
            [
                'id' => 7,
                'name' => 'Dur Muhurat',
                'type' => 'Inauspicious',
                'period' => [
                    [
                        'start' => '2020-05-12T07:39:16+05:30',
                        'end' => '2020-05-12T08:31:29+05:30',
                    ],
                    [
                        'start' => '2020-05-12T22:28:22+05:30',
                        'end' => '2020-05-12T23:12:06+05:30',
                    ],
                ],
            ],
            [
                'id' => 8,
                'name' => 'Varjyam',
                'type' => 'Inauspicious',
                'period' => [
                    [
                        'start' => '2020-05-12T12:25:22+05:30',
                        'end' => '2020-05-12T14:04:22+05:30',
                    ],
                ],
            ],
        ],
    ];

    public function testProcess()
    {
        $datetime = new \DateTimeImmutable(self::INPUT['datetime']);
        $tz = $datetime->getTimezone();
        $location = new Location(self::INPUT['latitude'], self::INPUT['longitude'], 0, $tz);
        $client = $this->setClient();

        $panchang = new Panchang($client);
        $test_basic_result = $panchang->process($location, $datetime);
        $basic_result = self::EXPECTED_RESULT;
        unset($basic_result['inauspicious_period'], $basic_result['auspicious_period']);
        $arNakshatra = $arNakshatraObject = [];
        foreach ($basic_result['nakshatra'] as $nakshatra) {
            $lord = new Planet($nakshatra['lord']['id'], $nakshatra['lord']['name'], $nakshatra['lord']['vedic_name']);
            $start = new \DateTimeImmutable($nakshatra['start']);
            $end = new \DateTimeImmutable($nakshatra['end']);
            $arNakshatra[] = new Nakshatra($nakshatra['id'], $nakshatra['name'], $lord, $start, $end);
            $nakshatraObject = (object)$nakshatra;
            $nakshatraObject->lord = (object)$nakshatra['lord'];
            $arNakshatraObject[] = $nakshatraObject;
        }

        $arTithi = $arTithiObject = [];
        foreach ($basic_result['tithi'] as $tithi) {
            $start = new \DateTimeImmutable($tithi['start']);
            $end = new \DateTimeImmutable($tithi['end']);
            $arTithi[] = new Tithi($tithi['index'], $tithi['id'], $tithi['name'], $tithi['paksha'], $start, $end);
            $arTithiObject[] = (object)$tithi;
        }

        $arKarana = $arKaranaObject = [];
        foreach ($basic_result['karana'] as $karana) {
            $start = new \DateTimeImmutable($karana['start']);
            $end = new \DateTimeImmutable($karana['end']);
            $arKarana[] = new Karana($karana['index'], $karana['id'], $karana['name'], $start, $end);
            $arKaranaObject[] = (object)$karana;
        }

        $arYoga = $arYogaObject = [];
        foreach ($basic_result['yoga'] as $yoga) {
            $start = new \DateTimeImmutable($yoga['start']);
            $end = new \DateTimeImmutable($yoga['end']);
            $arYoga[] = new Yoga($yoga['id'], $yoga['name'], $start, $end);
            $arYogaObject[] = (object)$yoga;
        }
        $sunrise = new \DateTimeImmutable($basic_result['sunrise']);
        $sunset = new \DateTimeImmutable($basic_result['sunset']);
        $moonrise = new \DateTimeImmutable($basic_result['moonrise']);
        $moonset = new \DateTimeImmutable($basic_result['moonset']);

        $expected_basic_result = new BasicPanchangResult($basic_result['vaara'], $arNakshatra, $arTithi, $arKarana, $arYoga, $sunrise, $sunset, $moonrise, $moonset);
        $expected_basic_result->setRawResponse((object)[
            'vaara' => $basic_result['vaara'],
            'nakshatra' => $arNakshatraObject,
            'tithi' => $arTithiObject,
            'karana' => $arKaranaObject,
            'yoga' => $arYogaObject,
            'sunrise' => $basic_result['sunrise'],
            'sunset' => $basic_result['sunset'],
            'moonrise' => $basic_result['moonrise'],
            'moonset' => $basic_result['moonset'],
        ]);

        $this->assertEquals($expected_basic_result, $test_basic_result);

        $test_advanced_result = $panchang->process($location, $datetime, true);
        $advanced_result = self::EXPECTED_RESULT;

        $arMuhurat = $apiResponseMuhurat = [];
        foreach ($advanced_result['inauspicious_period'] as $muhurat) {
            $periods = $apiResponsePeriod = [];
            foreach ($muhurat['period'] as $period) {
                $start = new \DateTimeImmutable($period['start']);
                $end = new \DateTimeImmutable($period['end']);
                $periods[] = new Period($start, $end);
                $apiResponsePeriod[] = (object)['start' => $period['start'], 'end' => $period['end']];
            }
            $arMuhurat[] = new Muhurat($muhurat['id'], $muhurat['name'], $muhurat['type'], $periods);
            $apiResponseMuhurat[] = (object)['id' => $muhurat['id'], 'name' => $muhurat['name'], 'type' => $muhurat['type'], 'period' => $apiResponsePeriod];
        }
        $inauspicious_period = $arMuhurat;
        $inauspicious_period_object = $apiResponseMuhurat;

        $arMuhurat = $apiResponseMuhurat = [];
        foreach ($advanced_result['auspicious_period'] as $muhurat) {
            $periods = $apiResponsePeriod = [];
            foreach ($muhurat['period'] as $period) {
                $start = new \DateTimeImmutable($period['start']);
                $end = new \DateTimeImmutable($period['end']);
                $periods[] = new Period($start, $end);
                $apiResponsePeriod[] = (object)['start' => $period['start'], 'end' => $period['end']];
            }
            $arMuhurat[] = new Muhurat($muhurat['id'], $muhurat['name'], $muhurat['type'], $periods);
            $apiResponseMuhurat[] = (object)['id' => $muhurat['id'], 'name' => $muhurat['name'], 'type' => $muhurat['type'], 'period' => $apiResponsePeriod];
        }
        $auspicious_period = $arMuhurat;
        $auspicious_period_object = $apiResponseMuhurat;

        $expected_advanced_result = new AdvancedPanchangResult($basic_result['vaara'], $arNakshatra, $arTithi, $arKarana, $arYoga, $sunrise, $sunset, $moonrise, $moonset, $auspicious_period, $inauspicious_period);
        $expected_advanced_result->setRawResponse((object)[
            'vaara' => $basic_result['vaara'],
            'nakshatra' => $arNakshatraObject,
            'tithi' => $arTithiObject,
            'karana' => $arKaranaObject,
            'yoga' => $arYogaObject,
            'sunrise' => $basic_result['sunrise'],
            'sunset' => $basic_result['sunset'],
            'moonrise' => $basic_result['moonrise'],
            'moonset' => $basic_result['moonset'],
            'auspicious_period' => $auspicious_period_object,
            'inauspicious_period' => $inauspicious_period_object,
        ]);

        $this->assertEquals($expected_advanced_result, $test_advanced_result);
    }
}
