<?php

namespace Prokerala\Tests\Api\Astrology\Service;

use DateTime;
use DateTimeImmutable;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Service\Choghadiya;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;
use Prokerala\Api\Astrology\Result\Panchang\Choghadiya\Period;
use Prokerala\Api\Astrology\Result\Panchang\Choghadiya as ChoghadiyaResult;

class ChoghadiyaTest extends BaseTestCase
{
    use AuthenticationTrait;

    const INPUT = [
        'datetime' => '1967-08-29T09:00:00+05:30',
        'latitude' => '19.0821978',
        'longitude' => '72.7411014', // Mumbai
    ];

    const ACTUAL_RESULT = [
        "muhurat" => [
            [
                "id" => 6,
                "name" => "Rog",
                "type" => "Inauspicious",
                "vela" => null,
                "is_day" => true,
                "start" => "1967-08-29T06:26:44+05:30",
                "end" => "1967-08-29T08:00:03+05:30"
            ],
            [
                "id" => 0,
                "name" => "Udveg",
                "type" => "Inauspicious",
                "vela" => "Vaar Vela",
                "is_day" => true,
                "start" => "1967-08-29T08:00:03+05:30",
                "end" => "1967-08-29T09:33:22+05:30"
            ],
            [
                "id" => 1,
                "name" => "Char",
                "type" => "Good",
                "vela" => null,
                "is_day" => true,
                "start" => "1967-08-29T09:33:22+05:30",
                "end" => "1967-08-29T11:06:41+05:30"
            ],
            [
                "id" => 2,
                "name" => "Labh",
                "type" => "Most Auspicious",
                "vela" => null,
                "is_day" => true,
                "start" => "1967-08-29T11:06:41+05:30",
                "end" => "1967-08-29T12:40:00+05:30"
            ],
            [
                "id" => 3,
                "name" => "Amrut",
                "type" => "Most Auspicious",
                "vela" => null,
                "is_day" => true,
                "start" => "1967-08-29T12:40:00+05:30",
                "end" => "1967-08-29T14:13:19+05:30"
            ],
            [
                "id" => 4,
                "name" => "Kaal",
                "type" => "Inauspicious",
                "vela" => "Kaal Vela",
                "is_day" => true,
                "start" => "1967-08-29T14:13:19+05:30",
                "end" => "1967-08-29T15:46:38+05:30"
            ],
            [
                "id" => 5,
                "name" => "Shubh",
                "type" => "Most Auspicious",
                "vela" => null,
                "is_day" => true,
                "start" => "1967-08-29T15:46:38+05:30",
                "end" => "1967-08-29T17:19:57+05:30"
            ],
            [
                "id" => 6,
                "name" => "Rog",
                "type" => "Inauspicious",
                "vela" => null,
                "is_day" => true,
                "start" => "1967-08-29T17:19:57+05:30",
                "end" => "1967-08-29T18:53:16+05:30"
            ],
            [
                "id" => 4,
                "name" => "Kaal",
                "type" => "Inauspicious",
                "vela" => null,
                "is_day" => false,
                "start" => "1967-08-29T18:53:21+05:30",
                "end" => "1967-08-29T20:20:02+05:30"
            ],
            [
                "id" => 5,
                "name" => "Labh",
                "type" => "Inauspicious",
                "vela" => "Kaal Ratri",
                "is_day" => false,
                "start" => "1967-08-29T20:20:02+05:30",
                "end" => "1967-08-29T21:46:43+05:30"
            ],
            [
                "id" => 6,
                "name" => "Udveg",
                "type" => "Inauspicious",
                "vela" => null,
                "is_day" => false,
                "start" => "1967-08-29T21:46:43+05:30",
                "end" => "1967-08-29T23:13:24+05:30"
            ],
            [
                "id" => 0,
                "name" => "Shubh",
                "type" => "Most Auspicious",
                "vela" => null,
                "is_day" => false,
                "start" => "1967-08-29T23:13:24+05:30",
                "end" => "1967-08-30T00:40:05+05:30"
            ],
            [
                "id" => 1,
                "name" => "Amrut",
                "type" => "Most Auspicious",
                "vela" => null,
                "is_day" => false,
                "start" => "1967-08-30T00:40:05+05:30",
                "end" => "1967-08-30T02:06:46+05:30"
            ],
            [
                "id" => 2,
                "name" => "Char",
                "type" => "Good",
                "vela" => null,
                "is_day" => false,
                "start" => "1967-08-30T02:06:46+05:30",
                "end" => "1967-08-30T03:33:27+05:30"
            ],
            [
                "id" => 3,
                "name" => "Rog",
                "type" => "Inauspicious",
                "vela" => null,
                "is_day" => false,
                "start" => "1967-08-30T03:33:27+05:30",
                "end" => "1967-08-30T05:00:08+05:30"
            ],
            [
                "id" => 4,
                "name" => "Kaal",
                "type" => "Inauspicious",
                "vela" => null,
                "is_day" => false,
                "start" => "1967-08-30T05:00:08+05:30",
                "end" => "1967-08-30T06:26:49+05:30"
            ]
        ]
    ];

    public function testProcess()
    {
        $datetime = new DateTime(self::INPUT['datetime']);
        $tz = $datetime->getTimezone();
        $location = new Location(self::INPUT['latitude'], self::INPUT['longitude'], 0, $tz);
        $client = $this->setClient();
        $method = new Choghadiya($client);
        $test_result = $method->process($location, $datetime);
        $result = self::ACTUAL_RESULT;
        $arMuhurat = [];
        $arMuhuratObject = [];
        foreach ($result['muhurat'] as $muhurat) {
            $start = new DateTimeImmutable($muhurat['start']);
            $end = new DateTimeImmutable($muhurat['end']);
            $arMuhurat[] = new Period($muhurat['id'], $muhurat['name'], $muhurat['type'], $muhurat['vela'], $muhurat['is_day'], $start, $end);
            $arMuhuratObject[] = (object)$muhurat;
        }
        $expected_result = new ChoghadiyaResult($arMuhurat);
        $expected_result->setRawResponse((object)['muhurat' => $arMuhuratObject]);
        $this->assertEquals($expected_result, $test_result);

    }

}
