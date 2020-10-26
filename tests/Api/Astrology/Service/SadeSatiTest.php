<?php

namespace Prokerala\Tests\Api\Astrology\Service;

use DateTime;
use DateTimeImmutable;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Service\SadeSati;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;
use Prokerala\Api\Astrology\Result\Horoscope\AdvancedSadeSati as AdvancedSadeSatiResult;
use Prokerala\Api\Astrology\Result\Horoscope\SadeSati as BasicSadeSatiResult;
use Prokerala\Api\Astrology\Result\Horoscope\SadeSati\SaturnTransit;

class SadeSatiTest extends BaseTestCase
{
    use AuthenticationTrait;

    const INPUT = [
        'datetime' => '1994-02-12T09:00:00+05:30',
        'latitude' => '19.0821978',
        'longitude' => '72.7411014', // Mumbai
    ];

    const EXPECTED_RESULT = [
        "is_in_sade_sati" => true,
        "transit_phase" => "Rising",
        "description" => "You are going through sade sati phase and you are in Rising phase.",
        "transits" => [
            [
                "saturn_sign" => "Kumbha",
                "phase" => "Peak",
                "start" => "1993-03-07T01:36:40+05:30",
                "end" => "1993-10-16T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Peak Phase started on March 07, 1993 and ended on October 16, 1993."
            ],
            [
                "saturn_sign" => "Makara",
                "phase" => "Rising",
                "start" => "1993-10-17T01:36:40+05:30",
                "end" => "1993-11-10T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Rising Phase started on October 17, 1993 and ended on November 10, 1993."
            ],
            [
                "saturn_sign" => "Kumbha",
                "phase" => "Peak",
                "start" => "1993-11-11T01:36:40+05:30",
                "end" => "1995-06-03T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Peak Phase started on November 11, 1993 and ended on June 03, 1995."
            ],
            [
                "saturn_sign" => "Meena",
                "phase" => "Setting",
                "start" => "1995-06-04T01:36:40+05:30",
                "end" => "1995-08-11T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Setting Phase started on June 04, 1995 and ended on August 11, 1995."
            ],
            [
                "saturn_sign" => "Kumbha",
                "phase" => "Peak",
                "start" => "1995-08-12T01:36:40+05:30",
                "end" => "1996-02-17T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Peak Phase started on August 12, 1995 and ended on February 17, 1996."
            ],
            [
                "saturn_sign" => "Meena",
                "phase" => "Setting",
                "start" => "1996-02-18T01:36:40+05:30",
                "end" => "1998-04-18T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Setting Phase started on February 18, 1996 and ended on April 18, 1998."
            ],
            [
                "saturn_sign" => "Vrishabha",
                "phase" => "Small Panoti",
                "start" => "2000-06-09T01:36:40+05:30",
                "end" => "2002-07-24T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Small Panoti Phase started on June 09, 2000 and ended on July 24, 2002."
            ],
            [
                "saturn_sign" => "Vrishabha",
                "phase" => "Small Panoti",
                "start" => "2003-01-10T01:36:40+05:30",
                "end" => "2003-04-08T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Small Panoti Phase started on January 10, 2003 and ended on April 08, 2003."
            ],
            [
                "saturn_sign" => "Kanya",
                "phase" => "Ashtama Sani",
                "start" => "2009-09-11T01:36:40+05:30",
                "end" => "2011-11-16T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Ashtama Sani Phase started on September 11, 2009 and ended on November 16, 2011."
            ],
            [
                "saturn_sign" => "Kanya",
                "phase" => "Ashtama Sani",
                "start" => "2012-05-18T01:36:40+05:30",
                "end" => "2012-08-05T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Ashtama Sani Phase started on May 18, 2012 and ended on August 05, 2012."
            ],
            [
                "saturn_sign" => "Makara",
                "phase" => "Rising",
                "start" => "2020-01-26T01:36:40+05:30",
                "end" => "2022-04-30T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Rising Phase started on January 26, 2020 and will end on April 30, 2022."
            ],
            [
                "saturn_sign" => "Kumbha",
                "phase" => "Peak",
                "start" => "2022-05-01T01:36:40+05:30",
                "end" => "2022-07-13T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Peak Phase will start on May 01, 2022 and will end on July 13, 2022."
            ],
            [
                "saturn_sign" => "Makara",
                "phase" => "Rising",
                "start" => "2022-07-14T01:36:40+05:30",
                "end" => "2023-01-18T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Rising Phase will start on July 14, 2022 and will end on January 18, 2023."
            ],
            [
                "saturn_sign" => "Kumbha",
                "phase" => "Peak",
                "start" => "2023-01-19T01:36:40+05:30",
                "end" => "2025-03-30T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Peak Phase will start on January 19, 2023 and will end on March 30, 2025."
            ],
            [
                "saturn_sign" => "Meena",
                "phase" => "Setting",
                "start" => "2025-03-31T01:36:40+05:30",
                "end" => "2027-06-04T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Setting Phase will start on March 31, 2025 and will end on June 04, 2027."
            ],
            [
                "saturn_sign" => "Meena",
                "phase" => "Setting",
                "start" => "2027-10-22T01:36:40+05:30",
                "end" => "2028-02-24T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Setting Phase will start on October 22, 2027 and will end on February 24, 2028."
            ],
            [
                "saturn_sign" => "Vrishabha",
                "phase" => "Small Panoti",
                "start" => "2029-08-10T01:36:40+05:30",
                "end" => "2029-10-06T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Small Panoti Phase will start on August 10, 2029 and will end on October 06, 2029."
            ],
            [
                "saturn_sign" => "Vrishabha",
                "phase" => "Small Panoti",
                "start" => "2030-04-19T01:36:40+05:30",
                "end" => "2032-06-01T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Small Panoti Phase will start on April 19, 2030 and will end on June 01, 2032."
            ],
            [
                "saturn_sign" => "Kanya",
                "phase" => "Ashtama Sani",
                "start" => "2038-10-24T01:36:40+05:30",
                "end" => "2039-04-06T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Ashtama Sani Phase will start on October 24, 2038 and will end on April 06, 2039."
            ],
            [
                "saturn_sign" => "Kanya",
                "phase" => "Ashtama Sani",
                "start" => "2039-07-15T01:36:40+05:30",
                "end" => "2041-01-29T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Ashtama Sani Phase will start on July 15, 2039 and will end on January 29, 2041."
            ],
            [
                "saturn_sign" => "Kanya",
                "phase" => "Ashtama Sani",
                "start" => "2041-02-08T01:36:40+05:30",
                "end" => "2041-09-27T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Ashtama Sani Phase will start on February 08, 2041 and will end on September 27, 2041."
            ],
            [
                "saturn_sign" => "Makara",
                "phase" => "Rising",
                "start" => "2049-03-08T01:36:40+05:30",
                "end" => "2049-07-11T01:36:40+05:30",
                "is_retrograde" => null,
                "description" => "Sade Sati Rising Phase will start on March 08, 2049 and will end on July 11, 2049."
            ]
        ]
    ];
    public function testProcess()
    {
        $datetime = new DateTime(self::INPUT['datetime']);
        $tz = $datetime->getTimezone();
        $location = new Location(self::INPUT['latitude'], self::INPUT['longitude'], 0, $tz);
        $client = $this->setClient();

        $result = self::EXPECTED_RESULT;

        $expected_basic_result = new BasicSadeSatiResult($result['is_in_sade_sati'], $result['transit_phase'], $result['description']);
        $expected_basic_result->setRawResponse((object)[
            'is_in_sade_sati' => $result['is_in_sade_sati'],
            'transit_phase' => $result['transit_phase'],
            'description' => $result['description']
        ]);

        $method = new SadeSati($client);
        $basic_test_result =  $method->process($location, $datetime);
        $advanced_test_result =  $method->process($location, $datetime, true);

        $this->assertEquals($expected_basic_result, $basic_test_result);

        $transit_result = $transit_object = [];
        foreach ($result['transits'] as $transit) {
            $start = new DateTimeImmutable($transit['start']);
            $end = new DateTimeImmutable($transit['end']);
            $transit_result[] = new SaturnTransit($transit['saturn_sign'], $transit['phase'], $start, $end, $transit['description'], $transit['is_retrograde']);
            $transit_object[] = (object)$transit;
        }
        $expected_advanced_result = new AdvancedSadeSatiResult($result['is_in_sade_sati'], $result['transit_phase'], $result['description'], $transit_result);
        $expected_advanced_result->setRawResponse((object)[
            'is_in_sade_sati' => $result['is_in_sade_sati'],
            'transit_phase' => $result['transit_phase'],
            'description' => $result['description'],
            'transits' => $transit_object,
        ]);
        $this->assertEquals($expected_advanced_result, $advanced_test_result);

    }
}
