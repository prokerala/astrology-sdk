<?php

namespace Prokerala\Tests\Api\Astrology\Service;

use DateTime;
use DateTimeImmutable;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Planet;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\Element\Zodiac;
use Prokerala\Api\Astrology\Result\Horoscope\AdvancedMangalDosha as AdvancedMangalDoshaResult;
use Prokerala\Api\Astrology\Result\Horoscope\BirthDetails as NakshatraResult;
use Prokerala\Api\Astrology\Result\Horoscope\MangalDosha as BasicMangalDoshaResult;
use Prokerala\Api\Astrology\Result\Horoscope\Nakshatra\NakshatraInfo;
use Prokerala\Api\Astrology\Service\Kundli;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaDetails as BasicYogaResult;
use Prokerala\Api\Astrology\Result\Horoscope\AdvancedKundli as AdvancedKundliResult;
use Prokerala\Api\Astrology\Result\Horoscope\Yoga\AdvancedYogaDetails as AdvancedYogaResult;
use Prokerala\Api\Astrology\Result\Horoscope\Kundli as BasicKundliResult;
use Prokerala\Tests\BaseTestCase;
use Prokerala\Api\Astrology\Result\Horoscope\Yoga\Yoga;
use Prokerala\Api\Astrology\Result\Horoscope\Dasha\Pratyantardasha;
use Prokerala\Api\Astrology\Result\Horoscope\Dasha\Antardasha;
use Prokerala\Api\Astrology\Result\Horoscope\Dasha\DashaPeriod;

class KundliTest extends BaseTestCase
{
    use AuthenticationTrait;

    const INPUT = [
        'datetime' => '1967-08-29T09:00:00+05:30',
        'latitude' => '19.0821978',
        'longitude' => '72.7411014', // Mumbai
    ];

    const EXPECTED_OUTPUT = [
        "nakshatra_details" => [
            "nakshatra" => [
                "id" => 3,
                "name" => "Rohini",
                "lord" => [
                    "id" => 1,
                    "name" => "Moon",
                    "vedic_name" => "Chandra"
                ],
                "pada" => 4
            ],
            "chandra_rasi" => [
                "id" => 1,
                "name" => "Vrishabha",
                "lord" => [
                    "id" => 3,
                    "name" => "Venus",
                    "vedic_name" => "Shukra"
                ]
            ],
            "soorya_rasi" => [
                "id" => 4,
                "name" => "Simha",
                "lord" => [
                    "id" => 0,
                    "name" => "Sun",
                    "vedic_name" => "Ravi"
                ]
            ],
            "zodiac" => [
                "id" => 5,
                "name" => "Virgo"
            ],
            "additional_info" => [
                "deity" => "Brahma",
                "ganam" => "Manushya",
                "symbol" => "Chariot (An ox cart)",
                "animal_sign" => "Snake",
                "nadi" => "Kapha",
                "color" => "White",
                "best_direction" => "East",
                "syllables" => "O, Va, Vi, Vu",
                "birth_stone" => "Pearl",
                "gender" => "female",
                "planet" => "Chandra",
                "enemy_yoni" => "Mongoose"
            ]
        ],
        "mangal_dosha" => [
            "has_dosha" => true,
            "description" => "The person is Manglik. Mars is positioned in the 2nd house, it is mild Manglik Dosha",
            "has_exception" => true,
            "type" => "Mild",
            "exceptions" => [
                "Mars is said to have a maturity age of 28. The malefic effects of Mars reduce after the age of 28.",
                "If a Manglik is born on a Tuesday, the negative effect of Manglik Dosha gets cancelled."
            ],
            "remedies" => [
                "It is considered that if a manglik person marries to another manglik person then the manglik dosha gets cancelled and has no effect.",
                "Worship Lord Hanuman by reciting Hanuman Chalisa daily & visit the temple of Lord Hanuman on Tuesdays.",
                "The ill effects of Manglik Dosha can be cancelled by performing a \"Kumbh Vivah\" in which the manglik marries a banana tree, a peepal tree, or a statue of God Vishnu before the actual wedding.",
                "The ill effects of Manglik Dosha can be reduced with the application of Special Pooja, Mantras, Gemstones and Charities.",
                "Donate blood on a Tuesday in every three months, if health permits.",
                "Feed birds with something sweet.",
                "Worship banyan tree with milk mixed with something sweet.",
                "Start a fast in a rising moon period on a Tuesday."
            ]
        ],
        "yoga_details" => [
            [
                "name" => "Major Yogas",
                "description" => "Your kundli have 2 major yogas.",
                "yoga_list" => [
                    [
                        "name" => "Gajakesari Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have gajakesari yoga."
                    ],
                    [
                        "name" => "Kedar Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have kedar yoga."
                    ],
                    [
                        "name" => "Kahal Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have kahala yoga."
                    ],
                    [
                        "name" => "Kamal Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have kamal yoga."
                    ],
                    [
                        "name" => "Musala Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have musala yoga."
                    ],
                    [
                        "name" => "Raja Yoga",
                        "has_yoga" => true,
                        "description" => "A typical Raja Yoga happens when two or more than two planets (out of which atleast one should be the lord of 'Kendra' & the other should be the lord of 'Trikon') is in a relationship with each other. This relationship can be a combination, bidirectional vision or exchange of zodiacs. A person with a Raja Yoga enjoys social status and fame.  Recognition and laurels will follow them for their efforts on various matters. In this chart there is relationship between Mars & Ketu planets."
                    ],
                    [
                        "name" => "Ruchaka Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have ruchaka yoga."
                    ],
                    [
                        "name" => "Bhadra Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have bhadra yoga."
                    ],
                    [
                        "name" => "Hamsa Yoga",
                        "has_yoga" => true,
                        "description" => "The Hamsa yoga, being one of the five of Panchmaha Purusha Yoga is a really auspicious yoga. Hamsa Yoga is said to be found in a person’s birth chart when Jupiter is in its own sign or in exaltation and occupies a Kendra house either from the Ascendant or from Moon. A person with Hamsa yoga is known to be satisfied with his life without a greed for money or the need to amass wealth. They are independent thinkers and  will be free from pessimistic thoughts. In this chart Jupiter is in exaltation."
                    ],
                    [
                        "name" => "Malavya Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have malavya yoga."
                    ],
                    [
                        "name" => "Sasa Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have sasa yoga."
                    ]
                ]
            ],
            [
                "name" => "Chandra Yogas",
                "description" => "Your kundli does not have any chandra yoga.",
                "yoga_list" => [
                    [
                        "name" => "Sunafa Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have sunafa yoga."
                    ],
                    [
                        "name" => "Anafa Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have anafa yoga."
                    ],
                    [
                        "name" => "Durudhara Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have durudhara yoga."
                    ],
                    [
                        "name" => "Kemadruma Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have Kemadruma yoga."
                    ]
                ]
            ],
            [
                "name" => "Soorya Yogas",
                "description" => "Your kundli have 1 soorya yoga.",
                "yoga_list" => [
                    [
                        "name" => "Veshi Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have veshi yoga."
                    ],
                    [
                        "name" => "Vaasi Yoga",
                        "has_yoga" => true,
                        "description" => "Vashi yoga is found in a birth chart when any planet except Rahu, Ketu and Moon is placed in the twelfth house from the Sun. Wealth, luxury and joy are seen to follow those with this yoga. Those with Vaasi yoga have a likeable personality and are talented, intelligent, systematic and diligent in anything that they undertake. They are honest and true to their words at all times. In this chart planet Jupiter is in the 12th house from Sun."
                    ],
                    [
                        "name" => "Ubhayachari Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have ubhayachari yoga."
                    ]
                ]
            ],
            [
                "name" => "Inauspicious Yogas",
                "description" => "Your kundli have 1 inauspicious yoga.",
                "yoga_list" => [
                    [
                        "name" => "Daridra Yoga",
                        "has_yoga" => true,
                        "description" => "The 11th house, 9th house and 2nd house in a chart are associated with wealth and luck. Daridra Yoga is formed when the lords of these houses have any connection with 6th, 8th or 12th house or with the lords of these houses. Some remedies of Daridra yoga are: You should not cut, shave, trim your hair or nails on the day of your birth, Tithi of your birth, Janma Nakshatra, Amavasya & Pournami Tithi, Tuesdays or even after noon time. Appeasing the Lord of the 11th house with specific Mantra, Yantra & Homa, fasting on specific Day is another way to  minimise the negative effects of daridra Yoga.Lakshmi Mantra is also an excellent option to counteract this Daridra yoga. In this chart saturn is in 12 Position."
                    ],
                    [
                        "name" => "Grahan Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have grahan yoga."
                    ],
                    [
                        "name" => "Shakat Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have shakat yoga."
                    ],
                    [
                        "name" => "Chandal Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have chandal yoga."
                    ],
                    [
                        "name" => "Kuja Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have kuja yoga."
                    ],
                    [
                        "name" => "Kemdrum Yoga",
                        "has_yoga" => false,
                        "description" => "Your kundli does not have kemdrum yoga."
                    ]
                ]
            ]
        ],
        "dasha_periods" => [
            [
                "id" => 1,
                "name" => "Moon",
                "start" => "1958-09-08T08:16:52+05:30",
                "end" => "1968-09-07T20:16:52+05:30",
                "antardasha" => [
                    [
                        "id" => 1,
                        "name" => "Moon",
                        "start" => "1958-09-08T08:16:52+05:30",
                        "end" => "1959-07-09T17:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1958-09-08T08:16:52+05:30",
                                "end" => "1958-10-03T17:01:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1958-10-03T17:01:52+05:30",
                                "end" => "1958-10-21T11:09:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1958-10-21T11:09:22+05:30",
                                "end" => "1958-12-06T02:54:22+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1958-12-06T02:54:22+05:30",
                                "end" => "1959-01-15T16:54:22+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1959-01-15T16:54:22+05:30",
                                "end" => "1959-03-04T21:31:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1959-03-04T21:31:52+05:30",
                                "end" => "1959-04-17T00:24:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1959-04-17T00:24:22+05:30",
                                "end" => "1959-05-04T18:31:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1959-05-04T18:31:52+05:30",
                                "end" => "1959-06-24T12:01:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1959-06-24T12:01:52+05:30",
                                "end" => "1959-07-09T17:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 4,
                        "name" => "Mars",
                        "start" => "1959-07-09T17:16:52+05:30",
                        "end" => "1960-02-07T18:46:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1959-07-09T17:16:52+05:30",
                                "end" => "1959-07-22T03:34:07+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1959-07-22T03:34:07+05:30",
                                "end" => "1959-08-23T02:35:37+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1959-08-23T02:35:37+05:30",
                                "end" => "1959-09-20T12:23:37+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1959-09-20T12:23:37+05:30",
                                "end" => "1959-10-24T06:01:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1959-10-24T06:01:52+05:30",
                                "end" => "1959-11-23T10:26:37+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1959-11-23T10:26:37+05:30",
                                "end" => "1959-12-05T20:43:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1959-12-05T20:43:52+05:30",
                                "end" => "1960-01-10T08:58:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1960-01-10T08:58:52+05:30",
                                "end" => "1960-01-21T00:39:22+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1960-01-21T00:39:22+05:30",
                                "end" => "1960-02-07T18:46:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 101,
                        "name" => "Rahu",
                        "start" => "1960-02-07T18:46:52+05:30",
                        "end" => "1961-08-08T15:46:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1960-02-07T18:46:52+05:30",
                                "end" => "1960-04-29T23:07:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1960-04-29T23:07:52+05:30",
                                "end" => "1960-07-12T00:19:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1960-07-12T00:19:52+05:30",
                                "end" => "1960-10-06T18:15:22+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1960-10-06T18:15:22+05:30",
                                "end" => "1960-12-23T09:01:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1960-12-23T09:01:52+05:30",
                                "end" => "1961-01-24T08:03:22+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1961-01-24T08:03:22+05:30",
                                "end" => "1961-04-25T15:33:22+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1961-04-25T15:33:22+05:30",
                                "end" => "1961-05-23T01:00:22+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1961-05-23T01:00:22+05:30",
                                "end" => "1961-07-07T16:45:22+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1961-07-07T16:45:22+05:30",
                                "end" => "1961-08-08T15:46:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 5,
                        "name" => "Jupiter",
                        "start" => "1961-08-08T15:46:52+05:30",
                        "end" => "1962-12-08T15:46:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1961-08-08T15:46:52+05:30",
                                "end" => "1961-10-12T14:10:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1961-10-12T14:10:52+05:30",
                                "end" => "1961-12-28T16:46:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1961-12-28T16:46:52+05:30",
                                "end" => "1962-03-07T16:34:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1962-03-07T16:34:52+05:30",
                                "end" => "1962-04-05T02:22:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1962-04-05T02:22:52+05:30",
                                "end" => "1962-06-25T06:22:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1962-06-25T06:22:52+05:30",
                                "end" => "1962-07-19T14:46:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1962-07-19T14:46:52+05:30",
                                "end" => "1962-08-29T04:46:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1962-08-29T04:46:52+05:30",
                                "end" => "1962-09-26T14:34:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1962-09-26T14:34:52+05:30",
                                "end" => "1962-12-08T15:46:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 6,
                        "name" => "Saturn",
                        "start" => "1962-12-08T15:46:52+05:30",
                        "end" => "1964-07-08T23:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1962-12-08T15:46:52+05:30",
                                "end" => "1963-03-10T05:22:07+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1963-03-10T05:22:07+05:30",
                                "end" => "1963-05-31T03:37:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1963-05-31T03:37:52+05:30",
                                "end" => "1963-07-03T21:16:07+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1963-07-03T21:16:07+05:30",
                                "end" => "1963-10-08T06:31:07+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1963-10-08T06:31:07+05:30",
                                "end" => "1963-11-06T04:29:37+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1963-11-06T04:29:37+05:30",
                                "end" => "1963-12-24T09:07:07+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1963-12-24T09:07:07+05:30",
                                "end" => "1964-01-27T02:45:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1964-01-27T02:45:22+05:30",
                                "end" => "1964-04-22T20:40:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1964-04-22T20:40:52+05:30",
                                "end" => "1964-07-08T23:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 2,
                        "name" => "Mercury",
                        "start" => "1964-07-08T23:16:52+05:30",
                        "end" => "1965-12-08T09:46:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1964-07-08T23:16:52+05:30",
                                "end" => "1964-09-20T06:34:07+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1964-09-20T06:34:07+05:30",
                                "end" => "1964-10-20T10:58:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1964-10-20T10:58:52+05:30",
                                "end" => "1965-01-14T16:43:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1965-01-14T16:43:52+05:30",
                                "end" => "1965-02-09T13:39:22+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1965-02-09T13:39:22+05:30",
                                "end" => "1965-03-24T16:31:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1965-03-24T16:31:52+05:30",
                                "end" => "1965-04-23T20:56:37+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1965-04-23T20:56:37+05:30",
                                "end" => "1965-07-10T11:43:07+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1965-07-10T11:43:07+05:30",
                                "end" => "1965-09-17T11:31:07+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1965-09-17T11:31:07+05:30",
                                "end" => "1965-12-08T09:46:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 102,
                        "name" => "Ketu",
                        "start" => "1965-12-08T09:46:52+05:30",
                        "end" => "1966-07-09T11:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1965-12-08T09:46:52+05:30",
                                "end" => "1965-12-20T20:04:07+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1965-12-20T20:04:07+05:30",
                                "end" => "1966-01-25T08:19:07+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1966-01-25T08:19:07+05:30",
                                "end" => "1966-02-04T23:59:37+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1966-02-04T23:59:37+05:30",
                                "end" => "1966-02-22T18:07:07+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1966-02-22T18:07:07+05:30",
                                "end" => "1966-03-07T04:24:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1966-03-07T04:24:22+05:30",
                                "end" => "1966-04-08T03:25:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1966-04-08T03:25:52+05:30",
                                "end" => "1966-05-06T13:13:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1966-05-06T13:13:52+05:30",
                                "end" => "1966-06-09T06:52:07+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1966-06-09T06:52:07+05:30",
                                "end" => "1966-07-09T11:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 3,
                        "name" => "Venus",
                        "start" => "1966-07-09T11:16:52+05:30",
                        "end" => "1968-03-09T05:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1966-07-09T11:16:52+05:30",
                                "end" => "1966-10-18T22:16:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1966-10-18T22:16:52+05:30",
                                "end" => "1966-11-18T08:46:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1966-11-18T08:46:52+05:30",
                                "end" => "1967-01-08T02:16:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1967-01-08T02:16:52+05:30",
                                "end" => "1967-02-12T14:31:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1967-02-12T14:31:52+05:30",
                                "end" => "1967-05-14T22:01:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1967-05-14T22:01:52+05:30",
                                "end" => "1967-08-04T02:01:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1967-08-04T02:01:52+05:30",
                                "end" => "1967-11-08T11:16:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1967-11-08T11:16:52+05:30",
                                "end" => "1968-02-02T17:01:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1968-02-02T17:01:52+05:30",
                                "end" => "1968-03-09T05:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 0,
                        "name" => "Sun",
                        "start" => "1968-03-09T05:16:52+05:30",
                        "end" => "1968-09-07T20:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1968-03-09T05:16:52+05:30",
                                "end" => "1968-03-18T08:25:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1968-03-18T08:25:52+05:30",
                                "end" => "1968-04-02T13:40:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1968-04-02T13:40:52+05:30",
                                "end" => "1968-04-13T05:21:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1968-04-13T05:21:22+05:30",
                                "end" => "1968-05-10T14:48:22+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1968-05-10T14:48:22+05:30",
                                "end" => "1968-06-03T23:12:22+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1968-06-03T23:12:22+05:30",
                                "end" => "1968-07-02T21:10:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1968-07-02T21:10:52+05:30",
                                "end" => "1968-07-28T18:06:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1968-07-28T18:06:22+05:30",
                                "end" => "1968-08-08T09:46:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1968-08-08T09:46:52+05:30",
                                "end" => "1968-09-07T20:16:52+05:30"
                            ]
                        ]
                    ]
                ]
            ],
            [
                "id" => 4,
                "name" => "Mars",
                "start" => "1968-09-07T20:16:52+05:30",
                "end" => "1975-09-08T14:16:52+05:30",
                "antardasha" => [
                    [
                        "id" => 4,
                        "name" => "Mars",
                        "start" => "1968-09-07T20:16:52+05:30",
                        "end" => "1969-02-03T23:43:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1968-09-07T20:16:52+05:30",
                                "end" => "1968-09-16T13:04:56+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1968-09-16T13:04:56+05:30",
                                "end" => "1968-10-08T21:59:59+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1968-10-08T21:59:59+05:30",
                                "end" => "1968-10-28T19:15:35+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1968-10-28T19:15:35+05:30",
                                "end" => "1968-11-21T10:00:21+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1968-11-21T10:00:21+05:30",
                                "end" => "1968-12-12T13:05:40+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1968-12-12T13:05:40+05:30",
                                "end" => "1968-12-21T05:53:44+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1968-12-21T05:53:44+05:30",
                                "end" => "1969-01-15T02:28:14+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1969-01-15T02:28:14+05:30",
                                "end" => "1969-01-22T13:26:35+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1969-01-22T13:26:35+05:30",
                                "end" => "1969-02-03T23:43:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 101,
                        "name" => "Rahu",
                        "start" => "1969-02-03T23:43:52+05:30",
                        "end" => "1970-02-22T12:01:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1969-02-03T23:43:52+05:30",
                                "end" => "1969-04-02T12:22:34+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1969-04-02T12:22:34+05:30",
                                "end" => "1969-05-23T15:36:58+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1969-05-23T15:36:58+05:30",
                                "end" => "1969-07-23T08:57:49+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1969-07-23T08:57:49+05:30",
                                "end" => "1969-09-15T16:54:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1969-09-15T16:54:22+05:30",
                                "end" => "1969-10-08T01:49:25+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1969-10-08T01:49:25+05:30",
                                "end" => "1969-12-10T23:52:25+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1969-12-10T23:52:25+05:30",
                                "end" => "1969-12-30T04:05:19+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1969-12-30T04:05:19+05:30",
                                "end" => "1970-01-31T03:06:49+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1970-01-31T03:06:49+05:30",
                                "end" => "1970-02-22T12:01:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 5,
                        "name" => "Jupiter",
                        "start" => "1970-02-22T12:01:52+05:30",
                        "end" => "1971-01-29T09:37:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1970-02-22T12:01:52+05:30",
                                "end" => "1970-04-08T22:54:40+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1970-04-08T22:54:40+05:30",
                                "end" => "1970-06-01T22:19:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1970-06-01T22:19:52+05:30",
                                "end" => "1970-07-20T05:23:28+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1970-07-20T05:23:28+05:30",
                                "end" => "1970-08-09T02:39:04+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1970-08-09T02:39:04+05:30",
                                "end" => "1970-10-04T22:15:04+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1970-10-04T22:15:04+05:30",
                                "end" => "1970-10-21T23:19:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1970-10-21T23:19:52+05:30",
                                "end" => "1970-11-19T09:07:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1970-11-19T09:07:52+05:30",
                                "end" => "1970-12-09T06:23:28+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1970-12-09T06:23:28+05:30",
                                "end" => "1971-01-29T09:37:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 6,
                        "name" => "Saturn",
                        "start" => "1971-01-29T09:37:52+05:30",
                        "end" => "1972-03-09T05:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1971-01-29T09:37:52+05:30",
                                "end" => "1971-04-03T11:56:32+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1971-04-03T11:56:32+05:30",
                                "end" => "1971-05-30T20:19:33+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1971-05-30T20:19:33+05:30",
                                "end" => "1971-06-23T11:04:19+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1971-06-23T11:04:19+05:30",
                                "end" => "1971-08-29T22:20:49+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1971-08-29T22:20:49+05:30",
                                "end" => "1971-09-19T04:07:46+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1971-09-19T04:07:46+05:30",
                                "end" => "1971-10-22T21:46:01+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1971-10-22T21:46:01+05:30",
                                "end" => "1971-11-15T12:30:47+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1971-11-15T12:30:47+05:30",
                                "end" => "1972-01-15T05:51:38+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1972-01-15T05:51:38+05:30",
                                "end" => "1972-03-09T05:16:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 2,
                        "name" => "Mercury",
                        "start" => "1972-03-09T05:16:52+05:30",
                        "end" => "1973-03-06T10:13:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1972-03-09T05:16:52+05:30",
                                "end" => "1972-04-29T12:46:56+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1972-04-29T12:46:56+05:30",
                                "end" => "1972-05-20T15:52:15+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1972-05-20T15:52:15+05:30",
                                "end" => "1972-07-20T00:41:45+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1972-07-20T00:41:45+05:30",
                                "end" => "1972-08-07T03:20:36+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1972-08-07T03:20:36+05:30",
                                "end" => "1972-09-06T07:45:21+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1972-09-06T07:45:21+05:30",
                                "end" => "1972-09-27T10:50:40+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1972-09-27T10:50:40+05:30",
                                "end" => "1972-11-20T18:47:13+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1972-11-20T18:47:13+05:30",
                                "end" => "1973-01-08T01:50:49+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1973-01-08T01:50:49+05:30",
                                "end" => "1973-03-06T10:13:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 102,
                        "name" => "Ketu",
                        "start" => "1973-03-06T10:13:52+05:30",
                        "end" => "1973-08-02T13:40:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1973-03-06T10:13:52+05:30",
                                "end" => "1973-03-15T03:01:56+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1973-03-15T03:01:56+05:30",
                                "end" => "1973-04-08T23:36:26+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1973-04-08T23:36:26+05:30",
                                "end" => "1973-04-16T10:34:47+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1973-04-16T10:34:47+05:30",
                                "end" => "1973-04-28T20:52:02+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1973-04-28T20:52:02+05:30",
                                "end" => "1973-05-07T13:40:06+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1973-05-07T13:40:06+05:30",
                                "end" => "1973-05-29T22:35:09+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1973-05-29T22:35:09+05:30",
                                "end" => "1973-06-18T19:50:45+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1973-06-18T19:50:45+05:30",
                                "end" => "1973-07-12T10:35:31+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1973-07-12T10:35:31+05:30",
                                "end" => "1973-08-02T13:40:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 3,
                        "name" => "Venus",
                        "start" => "1973-08-02T13:40:52+05:30",
                        "end" => "1974-10-02T16:40:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1973-08-02T13:40:52+05:30",
                                "end" => "1973-10-12T14:10:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1973-10-12T14:10:52+05:30",
                                "end" => "1973-11-02T21:31:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1973-11-02T21:31:52+05:30",
                                "end" => "1973-12-08T09:46:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1973-12-08T09:46:52+05:30",
                                "end" => "1974-01-02T06:21:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1974-01-02T06:21:22+05:30",
                                "end" => "1974-03-07T04:24:22+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1974-03-07T04:24:22+05:30",
                                "end" => "1974-05-03T00:00:22+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1974-05-03T00:00:22+05:30",
                                "end" => "1974-07-09T11:16:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1974-07-09T11:16:52+05:30",
                                "end" => "1974-09-07T20:06:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1974-09-07T20:06:22+05:30",
                                "end" => "1974-10-02T16:40:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 0,
                        "name" => "Sun",
                        "start" => "1974-10-02T16:40:52+05:30",
                        "end" => "1975-02-07T12:46:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1974-10-02T16:40:52+05:30",
                                "end" => "1974-10-09T02:05:10+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1974-10-09T02:05:10+05:30",
                                "end" => "1974-10-19T17:45:40+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1974-10-19T17:45:40+05:30",
                                "end" => "1974-10-27T04:44:01+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1974-10-27T04:44:01+05:30",
                                "end" => "1974-11-15T08:56:55+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1974-11-15T08:56:55+05:30",
                                "end" => "1974-12-02T10:01:43+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1974-12-02T10:01:43+05:30",
                                "end" => "1974-12-22T15:48:40+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1974-12-22T15:48:40+05:30",
                                "end" => "1975-01-09T18:27:31+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1975-01-09T18:27:31+05:30",
                                "end" => "1975-01-17T05:25:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1975-01-17T05:25:52+05:30",
                                "end" => "1975-02-07T12:46:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 1,
                        "name" => "Moon",
                        "start" => "1975-02-07T12:46:52+05:30",
                        "end" => "1975-09-08T14:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1975-02-07T12:46:52+05:30",
                                "end" => "1975-02-25T06:54:22+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1975-02-25T06:54:22+05:30",
                                "end" => "1975-03-09T17:11:37+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1975-03-09T17:11:37+05:30",
                                "end" => "1975-04-10T16:13:07+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1975-04-10T16:13:07+05:30",
                                "end" => "1975-05-09T02:01:07+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1975-05-09T02:01:07+05:30",
                                "end" => "1975-06-11T19:39:22+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1975-06-11T19:39:22+05:30",
                                "end" => "1975-07-12T00:04:07+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1975-07-12T00:04:07+05:30",
                                "end" => "1975-07-24T10:21:22+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1975-07-24T10:21:22+05:30",
                                "end" => "1975-08-28T22:36:22+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1975-08-28T22:36:22+05:30",
                                "end" => "1975-09-08T14:16:52+05:30"
                            ]
                        ]
                    ]
                ]
            ],
            [
                "id" => 101,
                "name" => "Rahu",
                "start" => "1975-09-08T14:16:52+05:30",
                "end" => "1993-09-08T02:16:52+05:30",
                "antardasha" => [
                    [
                        "id" => 101,
                        "name" => "Rahu",
                        "start" => "1975-09-08T14:16:52+05:30",
                        "end" => "1978-05-21T18:28:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1975-09-08T14:16:52+05:30",
                                "end" => "1976-02-03T12:30:40+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1976-02-03T12:30:40+05:30",
                                "end" => "1976-06-14T00:16:16+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1976-06-14T00:16:16+05:30",
                                "end" => "1976-11-17T03:44:10+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1976-11-17T03:44:10+05:30",
                                "end" => "1977-04-05T20:43:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1977-04-05T20:43:52+05:30",
                                "end" => "1977-06-02T09:22:34+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1977-06-02T09:22:34+05:30",
                                "end" => "1977-11-13T18:04:34+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1977-11-13T18:04:34+05:30",
                                "end" => "1978-01-02T01:29:10+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1978-01-02T01:29:10+05:30",
                                "end" => "1978-03-25T05:50:10+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1978-03-25T05:50:10+05:30",
                                "end" => "1978-05-21T18:28:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 5,
                        "name" => "Jupiter",
                        "start" => "1978-05-21T18:28:52+05:30",
                        "end" => "1980-10-14T08:52:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1978-05-21T18:28:52+05:30",
                                "end" => "1978-09-15T15:36:04+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1978-09-15T15:36:04+05:30",
                                "end" => "1979-02-01T10:40:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1979-02-01T10:40:52+05:30",
                                "end" => "1979-06-05T15:07:16+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1979-06-05T15:07:16+05:30",
                                "end" => "1979-07-26T18:21:40+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1979-07-26T18:21:40+05:30",
                                "end" => "1979-12-19T20:45:40+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1979-12-19T20:45:40+05:30",
                                "end" => "1980-02-01T16:40:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1980-02-01T16:40:52+05:30",
                                "end" => "1980-04-14T17:52:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1980-04-14T17:52:52+05:30",
                                "end" => "1980-06-04T21:07:16+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1980-06-04T21:07:16+05:30",
                                "end" => "1980-10-14T08:52:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 6,
                        "name" => "Saturn",
                        "start" => "1980-10-14T08:52:52+05:30",
                        "end" => "1983-08-21T07:58:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1980-10-14T08:52:52+05:30",
                                "end" => "1981-03-28T04:32:19+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1981-03-28T04:32:19+05:30",
                                "end" => "1981-08-22T15:48:40+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1981-08-22T15:48:40+05:30",
                                "end" => "1981-10-22T09:09:31+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1981-10-22T09:09:31+05:30",
                                "end" => "1982-04-13T21:00:31+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1982-04-13T21:00:31+05:30",
                                "end" => "1982-06-04T22:09:49+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1982-06-04T22:09:49+05:30",
                                "end" => "1982-08-30T16:05:19+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1982-08-30T16:05:19+05:30",
                                "end" => "1982-10-30T09:26:10+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1982-10-30T09:26:10+05:30",
                                "end" => "1983-04-04T12:54:04+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1983-04-04T12:54:04+05:30",
                                "end" => "1983-08-21T07:58:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 2,
                        "name" => "Mercury",
                        "start" => "1983-08-21T07:58:52+05:30",
                        "end" => "1986-03-09T17:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1983-08-21T07:58:52+05:30",
                                "end" => "1983-12-31T06:41:55+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1983-12-31T06:41:55+05:30",
                                "end" => "1984-02-23T14:38:28+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1984-02-23T14:38:28+05:30",
                                "end" => "1984-07-27T20:11:28+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1984-07-27T20:11:28+05:30",
                                "end" => "1984-09-12T09:51:22+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1984-09-12T09:51:22+05:30",
                                "end" => "1984-11-29T00:37:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1984-11-29T00:37:52+05:30",
                                "end" => "1985-01-22T08:34:25+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1985-01-22T08:34:25+05:30",
                                "end" => "1985-06-11T01:34:07+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1985-06-11T01:34:07+05:30",
                                "end" => "1985-10-13T06:00:31+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1985-10-13T06:00:31+05:30",
                                "end" => "1986-03-09T17:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 102,
                        "name" => "Ketu",
                        "start" => "1986-03-09T17:16:52+05:30",
                        "end" => "1987-03-28T05:34:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1986-03-09T17:16:52+05:30",
                                "end" => "1986-04-01T02:11:55+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1986-04-01T02:11:55+05:30",
                                "end" => "1986-06-04T00:14:55+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1986-06-04T00:14:55+05:30",
                                "end" => "1986-06-23T04:27:49+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1986-06-23T04:27:49+05:30",
                                "end" => "1986-07-25T03:29:19+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1986-07-25T03:29:19+05:30",
                                "end" => "1986-08-16T12:24:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1986-08-16T12:24:22+05:30",
                                "end" => "1986-10-13T01:03:04+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1986-10-13T01:03:04+05:30",
                                "end" => "1986-12-03T04:17:28+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1986-12-03T04:17:28+05:30",
                                "end" => "1987-02-01T21:38:19+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1987-02-01T21:38:19+05:30",
                                "end" => "1987-03-28T05:34:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 3,
                        "name" => "Venus",
                        "start" => "1987-03-28T05:34:52+05:30",
                        "end" => "1990-03-27T23:34:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1987-03-28T05:34:52+05:30",
                                "end" => "1987-09-26T20:34:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1987-09-26T20:34:52+05:30",
                                "end" => "1987-11-20T15:28:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1987-11-20T15:28:52+05:30",
                                "end" => "1988-02-19T22:58:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1988-02-19T22:58:52+05:30",
                                "end" => "1988-04-23T21:01:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1988-04-23T21:01:52+05:30",
                                "end" => "1988-10-05T05:43:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1988-10-05T05:43:52+05:30",
                                "end" => "1989-02-28T08:07:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1989-02-28T08:07:52+05:30",
                                "end" => "1989-08-20T19:58:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1989-08-20T19:58:52+05:30",
                                "end" => "1990-01-23T01:31:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1990-01-23T01:31:52+05:30",
                                "end" => "1990-03-27T23:34:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 0,
                        "name" => "Sun",
                        "start" => "1990-03-27T23:34:52+05:30",
                        "end" => "1991-02-19T16:58:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1990-03-27T23:34:52+05:30",
                                "end" => "1990-04-13T10:03:04+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1990-04-13T10:03:04+05:30",
                                "end" => "1990-05-10T19:30:04+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1990-05-10T19:30:04+05:30",
                                "end" => "1990-05-29T23:42:58+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1990-05-29T23:42:58+05:30",
                                "end" => "1990-07-18T07:07:34+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1990-07-18T07:07:34+05:30",
                                "end" => "1990-08-31T03:02:46+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1990-08-31T03:02:46+05:30",
                                "end" => "1990-10-22T04:12:04+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1990-10-22T04:12:04+05:30",
                                "end" => "1990-12-07T17:51:58+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1990-12-07T17:51:58+05:30",
                                "end" => "1990-12-26T22:04:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1990-12-26T22:04:52+05:30",
                                "end" => "1991-02-19T16:58:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 1,
                        "name" => "Moon",
                        "start" => "1991-02-19T16:58:52+05:30",
                        "end" => "1992-08-20T13:58:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1991-02-19T16:58:52+05:30",
                                "end" => "1991-04-06T08:43:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1991-04-06T08:43:52+05:30",
                                "end" => "1991-05-08T07:45:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1991-05-08T07:45:22+05:30",
                                "end" => "1991-07-29T12:06:22+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1991-07-29T12:06:22+05:30",
                                "end" => "1991-10-10T13:18:22+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1991-10-10T13:18:22+05:30",
                                "end" => "1992-01-05T07:13:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1992-01-05T07:13:52+05:30",
                                "end" => "1992-03-22T22:00:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1992-03-22T22:00:22+05:30",
                                "end" => "1992-04-23T21:01:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1992-04-23T21:01:52+05:30",
                                "end" => "1992-07-24T04:31:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1992-07-24T04:31:52+05:30",
                                "end" => "1992-08-20T13:58:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 4,
                        "name" => "Mars",
                        "start" => "1992-08-20T13:58:52+05:30",
                        "end" => "1993-09-08T02:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1992-08-20T13:58:52+05:30",
                                "end" => "1992-09-11T22:53:55+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1992-09-11T22:53:55+05:30",
                                "end" => "1992-11-08T11:32:37+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1992-11-08T11:32:37+05:30",
                                "end" => "1992-12-29T14:47:01+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1992-12-29T14:47:01+05:30",
                                "end" => "1993-02-28T08:07:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1993-02-28T08:07:52+05:30",
                                "end" => "1993-04-23T16:04:25+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1993-04-23T16:04:25+05:30",
                                "end" => "1993-05-16T00:59:28+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1993-05-16T00:59:28+05:30",
                                "end" => "1993-07-18T23:02:28+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1993-07-18T23:02:28+05:30",
                                "end" => "1993-08-07T03:15:22+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1993-08-07T03:15:22+05:30",
                                "end" => "1993-09-08T02:16:52+05:30"
                            ]
                        ]
                    ]
                ]
            ],
            [
                "id" => 5,
                "name" => "Jupiter",
                "start" => "1993-09-08T02:16:52+05:30",
                "end" => "2009-09-08T02:16:52+05:30",
                "antardasha" => [
                    [
                        "id" => 5,
                        "name" => "Jupiter",
                        "start" => "1993-09-08T02:16:52+05:30",
                        "end" => "1995-10-27T07:04:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1993-09-08T02:16:52+05:30",
                                "end" => "1993-12-20T23:43:16+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1993-12-20T23:43:16+05:30",
                                "end" => "1994-04-23T08:40:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1994-04-23T08:40:52+05:30",
                                "end" => "1994-08-11T17:57:40+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1994-08-11T17:57:40+05:30",
                                "end" => "1994-09-26T04:50:28+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1994-09-26T04:50:28+05:30",
                                "end" => "1995-02-03T01:38:28+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1995-02-03T01:38:28+05:30",
                                "end" => "1995-03-14T00:40:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1995-03-14T00:40:52+05:30",
                                "end" => "1995-05-17T23:04:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1995-05-17T23:04:52+05:30",
                                "end" => "1995-07-02T09:57:40+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1995-07-02T09:57:40+05:30",
                                "end" => "1995-10-27T07:04:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 6,
                        "name" => "Saturn",
                        "start" => "1995-10-27T07:04:52+05:30",
                        "end" => "1998-05-09T14:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "1995-10-27T07:04:52+05:30",
                                "end" => "1996-03-21T19:13:16+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1996-03-21T19:13:16+05:30",
                                "end" => "1996-07-30T21:14:28+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1996-07-30T21:14:28+05:30",
                                "end" => "1996-09-22T20:39:40+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1996-09-22T20:39:40+05:30",
                                "end" => "1997-02-24T01:51:40+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1997-02-24T01:51:40+05:30",
                                "end" => "1997-04-11T08:13:16+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1997-04-11T08:13:16+05:30",
                                "end" => "1997-06-27T10:49:16+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1997-06-27T10:49:16+05:30",
                                "end" => "1997-08-20T10:14:28+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1997-08-20T10:14:28+05:30",
                                "end" => "1998-01-06T05:19:16+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1998-01-06T05:19:16+05:30",
                                "end" => "1998-05-09T14:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 2,
                        "name" => "Mercury",
                        "start" => "1998-05-09T14:16:52+05:30",
                        "end" => "2000-08-14T11:52:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "1998-05-09T14:16:52+05:30",
                                "end" => "1998-09-03T21:08:28+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "1998-09-03T21:08:28+05:30",
                                "end" => "1998-10-22T04:12:04+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "1998-10-22T04:12:04+05:30",
                                "end" => "1999-03-09T03:48:04+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "1999-03-09T03:48:04+05:30",
                                "end" => "1999-04-19T13:16:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "1999-04-19T13:16:52+05:30",
                                "end" => "1999-06-27T13:04:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "1999-06-27T13:04:52+05:30",
                                "end" => "1999-08-14T20:08:28+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "1999-08-14T20:08:28+05:30",
                                "end" => "1999-12-17T00:34:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "1999-12-17T00:34:52+05:30",
                                "end" => "2000-04-05T09:51:40+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2000-04-05T09:51:40+05:30",
                                "end" => "2000-08-14T11:52:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 102,
                        "name" => "Ketu",
                        "start" => "2000-08-14T11:52:52+05:30",
                        "end" => "2001-07-21T09:28:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2000-08-14T11:52:52+05:30",
                                "end" => "2000-09-03T09:08:28+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2000-09-03T09:08:28+05:30",
                                "end" => "2000-10-30T04:44:28+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2000-10-30T04:44:28+05:30",
                                "end" => "2000-11-16T05:49:16+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2000-11-16T05:49:16+05:30",
                                "end" => "2000-12-14T15:37:16+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2000-12-14T15:37:16+05:30",
                                "end" => "2001-01-03T12:52:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2001-01-03T12:52:52+05:30",
                                "end" => "2001-02-23T16:07:16+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2001-02-23T16:07:16+05:30",
                                "end" => "2001-04-10T03:00:04+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2001-04-10T03:00:04+05:30",
                                "end" => "2001-06-03T02:25:16+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2001-06-03T02:25:16+05:30",
                                "end" => "2001-07-21T09:28:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 3,
                        "name" => "Venus",
                        "start" => "2001-07-21T09:28:52+05:30",
                        "end" => "2004-03-21T09:28:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2001-07-21T09:28:52+05:30",
                                "end" => "2001-12-30T17:28:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2001-12-30T17:28:52+05:30",
                                "end" => "2002-02-17T10:16:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2002-02-17T10:16:52+05:30",
                                "end" => "2002-05-09T14:16:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2002-05-09T14:16:52+05:30",
                                "end" => "2002-07-05T09:52:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2002-07-05T09:52:52+05:30",
                                "end" => "2002-11-28T12:16:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2002-11-28T12:16:52+05:30",
                                "end" => "2003-04-07T09:04:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2003-04-07T09:04:52+05:30",
                                "end" => "2003-09-08T14:16:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2003-09-08T14:16:52+05:30",
                                "end" => "2004-01-24T13:52:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2004-01-24T13:52:52+05:30",
                                "end" => "2004-03-21T09:28:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 0,
                        "name" => "Sun",
                        "start" => "2004-03-21T09:28:52+05:30",
                        "end" => "2005-01-07T14:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2004-03-21T09:28:52+05:30",
                                "end" => "2004-04-05T00:07:16+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2004-04-05T00:07:16+05:30",
                                "end" => "2004-04-29T08:31:16+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2004-04-29T08:31:16+05:30",
                                "end" => "2004-05-16T09:36:04+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2004-05-16T09:36:04+05:30",
                                "end" => "2004-06-29T05:31:16+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2004-06-29T05:31:16+05:30",
                                "end" => "2004-08-07T04:33:40+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2004-08-07T04:33:40+05:30",
                                "end" => "2004-09-22T10:55:16+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2004-09-22T10:55:16+05:30",
                                "end" => "2004-11-02T20:24:04+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2004-11-02T20:24:04+05:30",
                                "end" => "2004-11-19T21:28:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2004-11-19T21:28:52+05:30",
                                "end" => "2005-01-07T14:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 1,
                        "name" => "Moon",
                        "start" => "2005-01-07T14:16:52+05:30",
                        "end" => "2006-05-09T14:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2005-01-07T14:16:52+05:30",
                                "end" => "2005-02-17T04:16:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2005-02-17T04:16:52+05:30",
                                "end" => "2005-03-17T14:04:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2005-03-17T14:04:52+05:30",
                                "end" => "2005-05-29T15:16:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2005-05-29T15:16:52+05:30",
                                "end" => "2005-08-02T13:40:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2005-08-02T13:40:52+05:30",
                                "end" => "2005-10-18T16:16:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2005-10-18T16:16:52+05:30",
                                "end" => "2005-12-26T16:04:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2005-12-26T16:04:52+05:30",
                                "end" => "2006-01-24T01:52:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2006-01-24T01:52:52+05:30",
                                "end" => "2006-04-15T05:52:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2006-04-15T05:52:52+05:30",
                                "end" => "2006-05-09T14:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 4,
                        "name" => "Mars",
                        "start" => "2006-05-09T14:16:52+05:30",
                        "end" => "2007-04-15T11:52:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2006-05-09T14:16:52+05:30",
                                "end" => "2006-05-29T11:32:28+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2006-05-29T11:32:28+05:30",
                                "end" => "2006-07-19T14:46:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2006-07-19T14:46:52+05:30",
                                "end" => "2006-09-03T01:39:40+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2006-09-03T01:39:40+05:30",
                                "end" => "2006-10-27T01:04:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2006-10-27T01:04:52+05:30",
                                "end" => "2006-12-14T08:08:28+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2006-12-14T08:08:28+05:30",
                                "end" => "2007-01-03T05:24:04+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2007-01-03T05:24:04+05:30",
                                "end" => "2007-03-01T01:00:04+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2007-03-01T01:00:04+05:30",
                                "end" => "2007-03-18T02:04:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2007-03-18T02:04:52+05:30",
                                "end" => "2007-04-15T11:52:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 101,
                        "name" => "Rahu",
                        "start" => "2007-04-15T11:52:52+05:30",
                        "end" => "2009-09-08T02:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2007-04-15T11:52:52+05:30",
                                "end" => "2007-08-24T23:38:28+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2007-08-24T23:38:28+05:30",
                                "end" => "2007-12-19T20:45:40+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2007-12-19T20:45:40+05:30",
                                "end" => "2008-05-06T15:50:28+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2008-05-06T15:50:28+05:30",
                                "end" => "2008-09-07T20:16:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2008-09-07T20:16:52+05:30",
                                "end" => "2008-10-28T23:31:16+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2008-10-28T23:31:16+05:30",
                                "end" => "2009-03-24T01:55:16+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2009-03-24T01:55:16+05:30",
                                "end" => "2009-05-06T21:50:28+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2009-05-06T21:50:28+05:30",
                                "end" => "2009-07-18T23:02:28+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2009-07-18T23:02:28+05:30",
                                "end" => "2009-09-08T02:16:52+05:30"
                            ]
                        ]
                    ]
                ]
            ],
            [
                "id" => 6,
                "name" => "Saturn",
                "start" => "2009-09-08T02:16:52+05:30",
                "end" => "2028-09-07T20:16:52+05:30",
                "antardasha" => [
                    [
                        "id" => 6,
                        "name" => "Saturn",
                        "start" => "2009-09-08T02:16:52+05:30",
                        "end" => "2012-09-10T21:19:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2009-09-08T02:16:52+05:30",
                                "end" => "2010-03-01T01:41:50+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2010-03-01T01:41:50+05:30",
                                "end" => "2010-08-03T17:35:45+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2010-08-03T17:35:45+05:30",
                                "end" => "2010-10-06T19:54:25+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2010-10-06T19:54:25+05:30",
                                "end" => "2011-04-07T23:04:55+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2011-04-07T23:04:55+05:30",
                                "end" => "2011-06-01T21:38:04+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2011-06-01T21:38:04+05:30",
                                "end" => "2011-09-01T11:13:19+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2011-09-01T11:13:19+05:30",
                                "end" => "2011-11-04T13:31:59+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2011-11-04T13:31:59+05:30",
                                "end" => "2012-04-17T09:11:26+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2012-04-17T09:11:26+05:30",
                                "end" => "2012-09-10T21:19:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 2,
                        "name" => "Mercury",
                        "start" => "2012-09-10T21:19:52+05:30",
                        "end" => "2015-05-22T00:28:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2012-09-10T21:19:52+05:30",
                                "end" => "2013-01-28T03:58:38+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2013-01-28T03:58:38+05:30",
                                "end" => "2013-03-26T12:21:39+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2013-03-26T12:21:39+05:30",
                                "end" => "2013-09-06T08:53:09+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2013-09-06T08:53:09+05:30",
                                "end" => "2013-10-25T12:38:36+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2013-10-25T12:38:36+05:30",
                                "end" => "2014-01-15T10:54:21+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2014-01-15T10:54:21+05:30",
                                "end" => "2014-03-13T19:17:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2014-03-13T19:17:22+05:30",
                                "end" => "2014-08-08T06:33:43+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2014-08-08T06:33:43+05:30",
                                "end" => "2014-12-17T08:34:55+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2014-12-17T08:34:55+05:30",
                                "end" => "2015-05-22T00:28:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 102,
                        "name" => "Ketu",
                        "start" => "2015-05-22T00:28:52+05:30",
                        "end" => "2016-06-29T20:07:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2015-05-22T00:28:52+05:30",
                                "end" => "2015-06-14T15:13:38+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2015-06-14T15:13:38+05:30",
                                "end" => "2015-08-21T02:30:08+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2015-08-21T02:30:08+05:30",
                                "end" => "2015-09-10T08:17:05+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2015-09-10T08:17:05+05:30",
                                "end" => "2015-10-14T01:55:20+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2015-10-14T01:55:20+05:30",
                                "end" => "2015-11-06T16:40:06+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2015-11-06T16:40:06+05:30",
                                "end" => "2016-01-06T10:00:57+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2016-01-06T10:00:57+05:30",
                                "end" => "2016-02-29T09:26:09+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2016-02-29T09:26:09+05:30",
                                "end" => "2016-05-03T11:44:49+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2016-05-03T11:44:49+05:30",
                                "end" => "2016-06-29T20:07:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 3,
                        "name" => "Venus",
                        "start" => "2016-06-29T20:07:52+05:30",
                        "end" => "2019-08-30T11:07:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2016-06-29T20:07:52+05:30",
                                "end" => "2017-01-08T14:37:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2017-01-08T14:37:52+05:30",
                                "end" => "2017-03-07T10:34:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2017-03-07T10:34:52+05:30",
                                "end" => "2017-06-11T19:49:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2017-06-11T19:49:52+05:30",
                                "end" => "2017-08-18T07:06:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2017-08-18T07:06:22+05:30",
                                "end" => "2018-02-07T18:57:22+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2018-02-07T18:57:22+05:30",
                                "end" => "2018-07-12T00:09:22+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2018-07-12T00:09:22+05:30",
                                "end" => "2019-01-11T03:19:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2019-01-11T03:19:52+05:30",
                                "end" => "2019-06-23T23:51:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2019-06-23T23:51:22+05:30",
                                "end" => "2019-08-30T11:07:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 0,
                        "name" => "Sun",
                        "start" => "2019-08-30T11:07:52+05:30",
                        "end" => "2020-08-11T10:49:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2019-08-30T11:07:52+05:30",
                                "end" => "2019-09-16T19:30:58+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2019-09-16T19:30:58+05:30",
                                "end" => "2019-10-15T17:29:28+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2019-10-15T17:29:28+05:30",
                                "end" => "2019-11-04T23:16:25+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2019-11-04T23:16:25+05:30",
                                "end" => "2019-12-27T00:25:43+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2019-12-27T00:25:43+05:30",
                                "end" => "2020-02-11T06:47:19+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2020-02-11T06:47:19+05:30",
                                "end" => "2020-04-06T05:20:28+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2020-04-06T05:20:28+05:30",
                                "end" => "2020-05-25T09:05:55+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2020-05-25T09:05:55+05:30",
                                "end" => "2020-06-14T14:52:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2020-06-14T14:52:52+05:30",
                                "end" => "2020-08-11T10:49:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 1,
                        "name" => "Moon",
                        "start" => "2020-08-11T10:49:52+05:30",
                        "end" => "2022-03-12T18:19:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2020-08-11T10:49:52+05:30",
                                "end" => "2020-09-28T15:27:22+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2020-09-28T15:27:22+05:30",
                                "end" => "2020-11-01T09:05:37+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2020-11-01T09:05:37+05:30",
                                "end" => "2021-01-27T03:01:07+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2021-01-27T03:01:07+05:30",
                                "end" => "2021-04-14T05:37:07+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2021-04-14T05:37:07+05:30",
                                "end" => "2021-07-14T19:12:22+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2021-07-14T19:12:22+05:30",
                                "end" => "2021-10-04T17:28:07+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2021-10-04T17:28:07+05:30",
                                "end" => "2021-11-07T11:06:22+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2021-11-07T11:06:22+05:30",
                                "end" => "2022-02-11T20:21:22+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2022-02-11T20:21:22+05:30",
                                "end" => "2022-03-12T18:19:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 4,
                        "name" => "Mars",
                        "start" => "2022-03-12T18:19:52+05:30",
                        "end" => "2023-04-21T13:58:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2022-03-12T18:19:52+05:30",
                                "end" => "2022-04-05T09:04:38+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2022-04-05T09:04:38+05:30",
                                "end" => "2022-06-05T02:25:29+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2022-06-05T02:25:29+05:30",
                                "end" => "2022-07-29T01:50:41+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2022-07-29T01:50:41+05:30",
                                "end" => "2022-10-01T04:09:21+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2022-10-01T04:09:21+05:30",
                                "end" => "2022-11-27T12:32:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2022-11-27T12:32:22+05:30",
                                "end" => "2022-12-21T03:17:08+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2022-12-21T03:17:08+05:30",
                                "end" => "2023-02-26T14:33:38+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2023-02-26T14:33:38+05:30",
                                "end" => "2023-03-18T20:20:35+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2023-03-18T20:20:35+05:30",
                                "end" => "2023-04-21T13:58:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 101,
                        "name" => "Rahu",
                        "start" => "2023-04-21T13:58:52+05:30",
                        "end" => "2026-02-25T13:04:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2023-04-21T13:58:52+05:30",
                                "end" => "2023-09-24T17:26:46+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2023-09-24T17:26:46+05:30",
                                "end" => "2024-02-10T12:31:34+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2024-02-10T12:31:34+05:30",
                                "end" => "2024-07-24T08:11:01+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2024-07-24T08:11:01+05:30",
                                "end" => "2024-12-18T19:27:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2024-12-18T19:27:22+05:30",
                                "end" => "2025-02-17T12:48:13+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2025-02-17T12:48:13+05:30",
                                "end" => "2025-08-10T00:39:13+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2025-08-10T00:39:13+05:30",
                                "end" => "2025-10-01T01:48:31+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2025-10-01T01:48:31+05:30",
                                "end" => "2025-12-26T19:44:01+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2025-12-26T19:44:01+05:30",
                                "end" => "2026-02-25T13:04:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 5,
                        "name" => "Jupiter",
                        "start" => "2026-02-25T13:04:52+05:30",
                        "end" => "2028-09-07T20:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2026-02-25T13:04:52+05:30",
                                "end" => "2026-06-28T22:02:28+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2026-06-28T22:02:28+05:30",
                                "end" => "2026-11-22T10:10:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2026-11-22T10:10:52+05:30",
                                "end" => "2027-04-02T12:12:04+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2027-04-02T12:12:04+05:30",
                                "end" => "2027-05-26T11:37:16+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2027-05-26T11:37:16+05:30",
                                "end" => "2027-10-27T16:49:16+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2027-10-27T16:49:16+05:30",
                                "end" => "2027-12-12T23:10:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2027-12-12T23:10:52+05:30",
                                "end" => "2028-02-28T01:46:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2028-02-28T01:46:52+05:30",
                                "end" => "2028-04-22T01:12:04+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2028-04-22T01:12:04+05:30",
                                "end" => "2028-09-07T20:16:52+05:30"
                            ]
                        ]
                    ]
                ]
            ],
            [
                "id" => 2,
                "name" => "Mercury",
                "start" => "2028-09-07T20:16:52+05:30",
                "end" => "2045-09-08T02:16:52+05:30",
                "antardasha" => [
                    [
                        "id" => 2,
                        "name" => "Mercury",
                        "start" => "2028-09-07T20:16:52+05:30",
                        "end" => "2031-02-04T11:43:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2028-09-07T20:16:52+05:30",
                                "end" => "2029-01-10T11:04:11+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2029-01-10T11:04:11+05:30",
                                "end" => "2029-03-02T18:34:15+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2029-03-02T18:34:15+05:30",
                                "end" => "2029-07-27T09:08:45+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2029-07-27T09:08:45+05:30",
                                "end" => "2029-09-09T08:43:06+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2029-09-09T08:43:06+05:30",
                                "end" => "2029-11-21T16:00:21+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2029-11-21T16:00:21+05:30",
                                "end" => "2030-01-11T23:30:25+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2030-01-11T23:30:25+05:30",
                                "end" => "2030-05-23T22:13:28+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2030-05-23T22:13:28+05:30",
                                "end" => "2030-09-18T05:05:04+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2030-09-18T05:05:04+05:30",
                                "end" => "2031-02-04T11:43:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 102,
                        "name" => "Ketu",
                        "start" => "2031-02-04T11:43:52+05:30",
                        "end" => "2032-02-01T16:40:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2031-02-04T11:43:52+05:30",
                                "end" => "2031-02-25T14:49:11+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2031-02-25T14:49:11+05:30",
                                "end" => "2031-04-26T23:38:41+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2031-04-26T23:38:41+05:30",
                                "end" => "2031-05-15T02:17:32+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2031-05-15T02:17:32+05:30",
                                "end" => "2031-06-14T06:42:17+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2031-06-14T06:42:17+05:30",
                                "end" => "2031-07-05T09:47:36+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2031-07-05T09:47:36+05:30",
                                "end" => "2031-08-28T17:44:09+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2031-08-28T17:44:09+05:30",
                                "end" => "2031-10-16T00:47:45+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2031-10-16T00:47:45+05:30",
                                "end" => "2031-12-12T09:10:46+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2031-12-12T09:10:46+05:30",
                                "end" => "2032-02-01T16:40:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 3,
                        "name" => "Venus",
                        "start" => "2032-02-01T16:40:52+05:30",
                        "end" => "2034-12-02T13:40:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2032-02-01T16:40:52+05:30",
                                "end" => "2032-07-23T04:10:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2032-07-23T04:10:52+05:30",
                                "end" => "2032-09-12T22:01:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2032-09-12T22:01:52+05:30",
                                "end" => "2032-12-08T03:46:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2032-12-08T03:46:52+05:30",
                                "end" => "2033-02-06T12:36:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2033-02-06T12:36:22+05:30",
                                "end" => "2033-07-11T18:09:22+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2033-07-11T18:09:22+05:30",
                                "end" => "2033-11-26T17:45:22+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2033-11-26T17:45:22+05:30",
                                "end" => "2034-05-09T14:16:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2034-05-09T14:16:52+05:30",
                                "end" => "2034-10-03T04:51:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2034-10-03T04:51:22+05:30",
                                "end" => "2034-12-02T13:40:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 0,
                        "name" => "Sun",
                        "start" => "2034-12-02T13:40:52+05:30",
                        "end" => "2035-10-09T00:46:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2034-12-02T13:40:52+05:30",
                                "end" => "2034-12-18T02:14:10+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2034-12-18T02:14:10+05:30",
                                "end" => "2035-01-12T23:09:40+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2035-01-12T23:09:40+05:30",
                                "end" => "2035-01-31T01:48:31+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2035-01-31T01:48:31+05:30",
                                "end" => "2035-03-18T15:28:25+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2035-03-18T15:28:25+05:30",
                                "end" => "2035-04-29T00:57:13+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2035-04-29T00:57:13+05:30",
                                "end" => "2035-06-17T04:42:40+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2035-06-17T04:42:40+05:30",
                                "end" => "2035-07-31T04:17:01+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2035-07-31T04:17:01+05:30",
                                "end" => "2035-08-18T06:55:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2035-08-18T06:55:52+05:30",
                                "end" => "2035-10-09T00:46:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 1,
                        "name" => "Moon",
                        "start" => "2035-10-09T00:46:52+05:30",
                        "end" => "2037-03-09T11:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2035-10-09T00:46:52+05:30",
                                "end" => "2035-11-21T03:39:22+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2035-11-21T03:39:22+05:30",
                                "end" => "2035-12-21T08:04:07+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2035-12-21T08:04:07+05:30",
                                "end" => "2036-03-07T22:50:37+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2036-03-07T22:50:37+05:30",
                                "end" => "2036-05-15T22:38:37+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2036-05-15T22:38:37+05:30",
                                "end" => "2036-08-05T20:54:22+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2036-08-05T20:54:22+05:30",
                                "end" => "2036-10-18T04:11:37+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2036-10-18T04:11:37+05:30",
                                "end" => "2036-11-17T08:36:22+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2036-11-17T08:36:22+05:30",
                                "end" => "2037-02-11T14:21:22+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2037-02-11T14:21:22+05:30",
                                "end" => "2037-03-09T11:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 4,
                        "name" => "Mars",
                        "start" => "2037-03-09T11:16:52+05:30",
                        "end" => "2038-03-06T16:13:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2037-03-09T11:16:52+05:30",
                                "end" => "2037-03-30T14:22:11+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2037-03-30T14:22:11+05:30",
                                "end" => "2037-05-23T22:18:44+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2037-05-23T22:18:44+05:30",
                                "end" => "2037-07-11T05:22:20+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2037-07-11T05:22:20+05:30",
                                "end" => "2037-09-06T13:45:21+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2037-09-06T13:45:21+05:30",
                                "end" => "2037-10-27T21:15:25+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2037-10-27T21:15:25+05:30",
                                "end" => "2037-11-18T00:20:44+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2037-11-18T00:20:44+05:30",
                                "end" => "2038-01-17T09:10:14+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2038-01-17T09:10:14+05:30",
                                "end" => "2038-02-04T11:49:05+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2038-02-04T11:49:05+05:30",
                                "end" => "2038-03-06T16:13:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 101,
                        "name" => "Rahu",
                        "start" => "2038-03-06T16:13:52+05:30",
                        "end" => "2040-09-23T01:31:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2038-03-06T16:13:52+05:30",
                                "end" => "2038-07-24T09:13:34+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2038-07-24T09:13:34+05:30",
                                "end" => "2038-11-25T13:39:58+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2038-11-25T13:39:58+05:30",
                                "end" => "2039-04-22T00:56:19+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2039-04-22T00:56:19+05:30",
                                "end" => "2039-08-31T23:39:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2039-08-31T23:39:22+05:30",
                                "end" => "2039-10-25T07:35:55+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2039-10-25T07:35:55+05:30",
                                "end" => "2040-03-28T13:08:55+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2040-03-28T13:08:55+05:30",
                                "end" => "2040-05-14T02:48:49+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2040-05-14T02:48:49+05:30",
                                "end" => "2040-07-30T17:35:19+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2040-07-30T17:35:19+05:30",
                                "end" => "2040-09-23T01:31:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 5,
                        "name" => "Jupiter",
                        "start" => "2040-09-23T01:31:52+05:30",
                        "end" => "2042-12-29T23:07:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2040-09-23T01:31:52+05:30",
                                "end" => "2041-01-11T10:48:40+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2041-01-11T10:48:40+05:30",
                                "end" => "2041-05-22T12:49:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2041-05-22T12:49:52+05:30",
                                "end" => "2041-09-16T19:41:28+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2041-09-16T19:41:28+05:30",
                                "end" => "2041-11-04T02:45:04+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2041-11-04T02:45:04+05:30",
                                "end" => "2042-03-22T02:21:04+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2042-03-22T02:21:04+05:30",
                                "end" => "2042-05-02T11:49:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2042-05-02T11:49:52+05:30",
                                "end" => "2042-07-10T11:37:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2042-07-10T11:37:52+05:30",
                                "end" => "2042-08-27T18:41:28+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2042-08-27T18:41:28+05:30",
                                "end" => "2042-12-29T23:07:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 6,
                        "name" => "Saturn",
                        "start" => "2042-12-29T23:07:52+05:30",
                        "end" => "2045-09-08T02:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2042-12-29T23:07:52+05:30",
                                "end" => "2043-06-03T15:01:47+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2043-06-03T15:01:47+05:30",
                                "end" => "2043-10-20T21:40:33+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2043-10-20T21:40:33+05:30",
                                "end" => "2043-12-17T06:03:34+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2043-12-17T06:03:34+05:30",
                                "end" => "2044-05-29T02:35:04+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2044-05-29T02:35:04+05:30",
                                "end" => "2044-07-17T06:20:31+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2044-07-17T06:20:31+05:30",
                                "end" => "2044-10-07T04:36:16+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2044-10-07T04:36:16+05:30",
                                "end" => "2044-12-03T12:59:17+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2044-12-03T12:59:17+05:30",
                                "end" => "2045-04-30T00:15:38+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2045-04-30T00:15:38+05:30",
                                "end" => "2045-09-08T02:16:50+05:30"
                            ]
                        ]
                    ]
                ]
            ],
            [
                "id" => 102,
                "name" => "Ketu",
                "start" => "2045-09-08T02:16:52+05:30",
                "end" => "2052-09-07T20:16:52+05:30",
                "antardasha" => [
                    [
                        "id" => 102,
                        "name" => "Ketu",
                        "start" => "2045-09-08T02:16:52+05:30",
                        "end" => "2046-02-04T05:43:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2045-09-08T02:16:52+05:30",
                                "end" => "2045-09-16T19:04:56+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2045-09-16T19:04:56+05:30",
                                "end" => "2045-10-11T15:39:26+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2045-10-11T15:39:26+05:30",
                                "end" => "2045-10-19T02:37:47+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2045-10-19T02:37:47+05:30",
                                "end" => "2045-10-31T12:55:02+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2045-10-31T12:55:02+05:30",
                                "end" => "2045-11-09T05:43:06+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2045-11-09T05:43:06+05:30",
                                "end" => "2045-12-01T14:38:09+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2045-12-01T14:38:09+05:30",
                                "end" => "2045-12-21T11:53:45+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2045-12-21T11:53:45+05:30",
                                "end" => "2046-01-14T02:38:31+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2046-01-14T02:38:31+05:30",
                                "end" => "2046-02-04T05:43:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 3,
                        "name" => "Venus",
                        "start" => "2046-02-04T05:43:52+05:30",
                        "end" => "2047-04-06T08:43:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2046-02-04T05:43:52+05:30",
                                "end" => "2046-04-16T06:13:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2046-04-16T06:13:52+05:30",
                                "end" => "2046-05-07T13:34:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2046-05-07T13:34:52+05:30",
                                "end" => "2046-06-12T01:49:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2046-06-12T01:49:52+05:30",
                                "end" => "2046-07-06T22:24:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2046-07-06T22:24:22+05:30",
                                "end" => "2046-09-08T20:27:22+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2046-09-08T20:27:22+05:30",
                                "end" => "2046-11-04T16:03:22+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2046-11-04T16:03:22+05:30",
                                "end" => "2047-01-11T03:19:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2047-01-11T03:19:52+05:30",
                                "end" => "2047-03-12T12:09:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2047-03-12T12:09:22+05:30",
                                "end" => "2047-04-06T08:43:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 0,
                        "name" => "Sun",
                        "start" => "2047-04-06T08:43:52+05:30",
                        "end" => "2047-08-12T04:49:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2047-04-06T08:43:52+05:30",
                                "end" => "2047-04-12T18:08:10+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2047-04-12T18:08:10+05:30",
                                "end" => "2047-04-23T09:48:40+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2047-04-23T09:48:40+05:30",
                                "end" => "2047-04-30T20:47:01+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2047-04-30T20:47:01+05:30",
                                "end" => "2047-05-20T00:59:55+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2047-05-20T00:59:55+05:30",
                                "end" => "2047-06-06T02:04:43+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2047-06-06T02:04:43+05:30",
                                "end" => "2047-06-26T07:51:40+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2047-06-26T07:51:40+05:30",
                                "end" => "2047-07-14T10:30:31+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2047-07-14T10:30:31+05:30",
                                "end" => "2047-07-21T21:28:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2047-07-21T21:28:52+05:30",
                                "end" => "2047-08-12T04:49:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 1,
                        "name" => "Moon",
                        "start" => "2047-08-12T04:49:52+05:30",
                        "end" => "2048-03-12T06:19:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2047-08-12T04:49:52+05:30",
                                "end" => "2047-08-29T22:57:22+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2047-08-29T22:57:22+05:30",
                                "end" => "2047-09-11T09:14:37+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2047-09-11T09:14:37+05:30",
                                "end" => "2047-10-13T08:16:07+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2047-10-13T08:16:07+05:30",
                                "end" => "2047-11-10T18:04:07+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2047-11-10T18:04:07+05:30",
                                "end" => "2047-12-14T11:42:22+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2047-12-14T11:42:22+05:30",
                                "end" => "2048-01-13T16:07:07+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2048-01-13T16:07:07+05:30",
                                "end" => "2048-01-26T02:24:22+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2048-01-26T02:24:22+05:30",
                                "end" => "2048-03-01T14:39:22+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2048-03-01T14:39:22+05:30",
                                "end" => "2048-03-12T06:19:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 4,
                        "name" => "Mars",
                        "start" => "2048-03-12T06:19:52+05:30",
                        "end" => "2048-08-08T09:46:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2048-03-12T06:19:52+05:30",
                                "end" => "2048-03-20T23:07:56+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2048-03-20T23:07:56+05:30",
                                "end" => "2048-04-12T08:02:59+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2048-04-12T08:02:59+05:30",
                                "end" => "2048-05-02T05:18:35+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2048-05-02T05:18:35+05:30",
                                "end" => "2048-05-25T20:03:21+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2048-05-25T20:03:21+05:30",
                                "end" => "2048-06-15T23:08:40+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2048-06-15T23:08:40+05:30",
                                "end" => "2048-06-24T15:56:44+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2048-06-24T15:56:44+05:30",
                                "end" => "2048-07-19T12:31:14+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2048-07-19T12:31:14+05:30",
                                "end" => "2048-07-26T23:29:35+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2048-07-26T23:29:35+05:30",
                                "end" => "2048-08-08T09:46:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 101,
                        "name" => "Rahu",
                        "start" => "2048-08-08T09:46:52+05:30",
                        "end" => "2049-08-26T22:04:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2048-08-08T09:46:52+05:30",
                                "end" => "2048-10-04T22:25:34+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2048-10-04T22:25:34+05:30",
                                "end" => "2048-11-25T01:39:58+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2048-11-25T01:39:58+05:30",
                                "end" => "2049-01-24T19:00:49+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2049-01-24T19:00:49+05:30",
                                "end" => "2049-03-20T02:57:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2049-03-20T02:57:22+05:30",
                                "end" => "2049-04-11T11:52:25+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2049-04-11T11:52:25+05:30",
                                "end" => "2049-06-14T09:55:25+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2049-06-14T09:55:25+05:30",
                                "end" => "2049-07-03T14:08:19+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2049-07-03T14:08:19+05:30",
                                "end" => "2049-08-04T13:09:49+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2049-08-04T13:09:49+05:30",
                                "end" => "2049-08-26T22:04:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 5,
                        "name" => "Jupiter",
                        "start" => "2049-08-26T22:04:52+05:30",
                        "end" => "2050-08-02T19:40:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2049-08-26T22:04:52+05:30",
                                "end" => "2049-10-11T08:57:40+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2049-10-11T08:57:40+05:30",
                                "end" => "2049-12-04T08:22:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2049-12-04T08:22:52+05:30",
                                "end" => "2050-01-21T15:26:28+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2050-01-21T15:26:28+05:30",
                                "end" => "2050-02-10T12:42:04+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2050-02-10T12:42:04+05:30",
                                "end" => "2050-04-08T08:18:04+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2050-04-08T08:18:04+05:30",
                                "end" => "2050-04-25T09:22:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2050-04-25T09:22:52+05:30",
                                "end" => "2050-05-23T19:10:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2050-05-23T19:10:52+05:30",
                                "end" => "2050-06-12T16:26:28+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2050-06-12T16:26:28+05:30",
                                "end" => "2050-08-02T19:40:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 6,
                        "name" => "Saturn",
                        "start" => "2050-08-02T19:40:52+05:30",
                        "end" => "2051-09-11T15:19:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2050-08-02T19:40:52+05:30",
                                "end" => "2050-10-05T21:59:32+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2050-10-05T21:59:32+05:30",
                                "end" => "2050-12-02T06:22:33+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2050-12-02T06:22:33+05:30",
                                "end" => "2050-12-25T21:07:19+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2050-12-25T21:07:19+05:30",
                                "end" => "2051-03-03T08:23:49+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2051-03-03T08:23:49+05:30",
                                "end" => "2051-03-23T14:10:46+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2051-03-23T14:10:46+05:30",
                                "end" => "2051-04-26T07:49:01+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2051-04-26T07:49:01+05:30",
                                "end" => "2051-05-19T22:33:47+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2051-05-19T22:33:47+05:30",
                                "end" => "2051-07-19T15:54:38+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2051-07-19T15:54:38+05:30",
                                "end" => "2051-09-11T15:19:50+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 2,
                        "name" => "Mercury",
                        "start" => "2051-09-11T15:19:52+05:30",
                        "end" => "2052-09-07T20:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2051-09-11T15:19:52+05:30",
                                "end" => "2051-11-01T22:49:56+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2051-11-01T22:49:56+05:30",
                                "end" => "2051-11-23T01:55:15+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2051-11-23T01:55:15+05:30",
                                "end" => "2052-01-22T10:44:45+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2052-01-22T10:44:45+05:30",
                                "end" => "2052-02-09T13:23:36+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2052-02-09T13:23:36+05:30",
                                "end" => "2052-03-10T17:48:21+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2052-03-10T17:48:21+05:30",
                                "end" => "2052-03-31T20:53:40+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2052-03-31T20:53:40+05:30",
                                "end" => "2052-05-25T04:50:13+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2052-05-25T04:50:13+05:30",
                                "end" => "2052-07-12T11:53:49+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2052-07-12T11:53:49+05:30",
                                "end" => "2052-09-07T20:16:50+05:30"
                            ]
                        ]
                    ]
                ]
            ],
            [
                "id" => 3,
                "name" => "Venus",
                "start" => "2052-09-07T20:16:52+05:30",
                "end" => "2072-09-07T20:16:52+05:30",
                "antardasha" => [
                    [
                        "id" => 3,
                        "name" => "Venus",
                        "start" => "2052-09-07T20:16:52+05:30",
                        "end" => "2056-01-08T08:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2052-09-07T20:16:52+05:30",
                                "end" => "2053-03-29T18:16:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2053-03-29T18:16:52+05:30",
                                "end" => "2053-05-29T15:16:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2053-05-29T15:16:52+05:30",
                                "end" => "2053-09-08T02:16:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2053-09-08T02:16:52+05:30",
                                "end" => "2053-11-18T02:46:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2053-11-18T02:46:52+05:30",
                                "end" => "2054-05-19T17:46:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2054-05-19T17:46:52+05:30",
                                "end" => "2054-10-29T01:46:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2054-10-29T01:46:52+05:30",
                                "end" => "2055-05-09T20:16:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2055-05-09T20:16:52+05:30",
                                "end" => "2055-10-29T07:46:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2055-10-29T07:46:52+05:30",
                                "end" => "2056-01-08T08:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 0,
                        "name" => "Sun",
                        "start" => "2056-01-08T08:16:52+05:30",
                        "end" => "2057-01-07T14:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2056-01-08T08:16:52+05:30",
                                "end" => "2056-01-26T14:34:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2056-01-26T14:34:52+05:30",
                                "end" => "2056-02-26T01:04:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2056-02-26T01:04:52+05:30",
                                "end" => "2056-03-18T08:25:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2056-03-18T08:25:52+05:30",
                                "end" => "2056-05-12T03:19:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2056-05-12T03:19:52+05:30",
                                "end" => "2056-06-29T20:07:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2056-06-29T20:07:52+05:30",
                                "end" => "2056-08-26T16:04:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2056-08-26T16:04:52+05:30",
                                "end" => "2056-10-17T09:55:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2056-10-17T09:55:52+05:30",
                                "end" => "2056-11-07T17:16:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2056-11-07T17:16:52+05:30",
                                "end" => "2057-01-07T14:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 1,
                        "name" => "Moon",
                        "start" => "2057-01-07T14:16:52+05:30",
                        "end" => "2058-09-08T08:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2057-01-07T14:16:52+05:30",
                                "end" => "2057-02-27T07:46:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2057-02-27T07:46:52+05:30",
                                "end" => "2057-04-03T20:01:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2057-04-03T20:01:52+05:30",
                                "end" => "2057-07-04T03:31:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2057-07-04T03:31:52+05:30",
                                "end" => "2057-09-23T07:31:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2057-09-23T07:31:52+05:30",
                                "end" => "2057-12-28T16:46:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2057-12-28T16:46:52+05:30",
                                "end" => "2058-03-24T22:31:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2058-03-24T22:31:52+05:30",
                                "end" => "2058-04-29T10:46:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2058-04-29T10:46:52+05:30",
                                "end" => "2058-08-08T21:46:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2058-08-08T21:46:52+05:30",
                                "end" => "2058-09-08T08:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 4,
                        "name" => "Mars",
                        "start" => "2058-09-08T08:16:52+05:30",
                        "end" => "2059-11-08T11:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2058-09-08T08:16:52+05:30",
                                "end" => "2058-10-03T04:51:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2058-10-03T04:51:22+05:30",
                                "end" => "2058-12-06T02:54:22+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2058-12-06T02:54:22+05:30",
                                "end" => "2059-01-31T22:30:22+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2059-01-31T22:30:22+05:30",
                                "end" => "2059-04-09T09:46:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2059-04-09T09:46:52+05:30",
                                "end" => "2059-06-08T18:36:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2059-06-08T18:36:22+05:30",
                                "end" => "2059-07-03T15:10:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2059-07-03T15:10:52+05:30",
                                "end" => "2059-09-12T15:40:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2059-09-12T15:40:52+05:30",
                                "end" => "2059-10-03T23:01:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2059-10-03T23:01:52+05:30",
                                "end" => "2059-11-08T11:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 101,
                        "name" => "Rahu",
                        "start" => "2059-11-08T11:16:52+05:30",
                        "end" => "2062-11-08T05:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2059-11-08T11:16:52+05:30",
                                "end" => "2060-04-20T19:58:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2060-04-20T19:58:52+05:30",
                                "end" => "2060-09-13T22:22:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2060-09-13T22:22:52+05:30",
                                "end" => "2061-03-06T10:13:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2061-03-06T10:13:52+05:30",
                                "end" => "2061-08-08T15:46:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2061-08-08T15:46:52+05:30",
                                "end" => "2061-10-11T13:49:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2061-10-11T13:49:52+05:30",
                                "end" => "2062-04-12T04:49:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2062-04-12T04:49:52+05:30",
                                "end" => "2062-06-05T23:43:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2062-06-05T23:43:52+05:30",
                                "end" => "2062-09-05T07:13:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2062-09-05T07:13:52+05:30",
                                "end" => "2062-11-08T05:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 5,
                        "name" => "Jupiter",
                        "start" => "2062-11-08T05:16:52+05:30",
                        "end" => "2065-07-09T05:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2062-11-08T05:16:52+05:30",
                                "end" => "2063-03-18T02:04:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2063-03-18T02:04:52+05:30",
                                "end" => "2063-08-19T07:16:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2063-08-19T07:16:52+05:30",
                                "end" => "2064-01-04T06:52:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2064-01-04T06:52:52+05:30",
                                "end" => "2064-03-01T02:28:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2064-03-01T02:28:52+05:30",
                                "end" => "2064-08-10T10:28:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2064-08-10T10:28:52+05:30",
                                "end" => "2064-09-28T03:16:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2064-09-28T03:16:52+05:30",
                                "end" => "2064-12-18T07:16:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2064-12-18T07:16:52+05:30",
                                "end" => "2065-02-13T02:52:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2065-02-13T02:52:52+05:30",
                                "end" => "2065-07-09T05:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 6,
                        "name" => "Saturn",
                        "start" => "2065-07-09T05:16:52+05:30",
                        "end" => "2068-09-07T20:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2065-07-09T05:16:52+05:30",
                                "end" => "2066-01-08T08:27:22+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2066-01-08T08:27:22+05:30",
                                "end" => "2066-06-21T04:58:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2066-06-21T04:58:52+05:30",
                                "end" => "2066-08-27T16:15:22+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2066-08-27T16:15:22+05:30",
                                "end" => "2067-03-08T10:45:22+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2067-03-08T10:45:22+05:30",
                                "end" => "2067-05-05T06:42:22+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2067-05-05T06:42:22+05:30",
                                "end" => "2067-08-09T15:57:22+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2067-08-09T15:57:22+05:30",
                                "end" => "2067-10-16T03:13:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2067-10-16T03:13:52+05:30",
                                "end" => "2068-04-06T15:04:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2068-04-06T15:04:52+05:30",
                                "end" => "2068-09-07T20:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 2,
                        "name" => "Mercury",
                        "start" => "2068-09-07T20:16:52+05:30",
                        "end" => "2071-07-09T17:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2068-09-07T20:16:52+05:30",
                                "end" => "2069-02-01T10:51:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2069-02-01T10:51:22+05:30",
                                "end" => "2069-04-02T19:40:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2069-04-02T19:40:52+05:30",
                                "end" => "2069-09-22T07:10:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2069-09-22T07:10:52+05:30",
                                "end" => "2069-11-13T01:01:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2069-11-13T01:01:52+05:30",
                                "end" => "2070-02-07T06:46:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2070-02-07T06:46:52+05:30",
                                "end" => "2070-04-08T15:36:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2070-04-08T15:36:22+05:30",
                                "end" => "2070-09-10T21:09:22+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2070-09-10T21:09:22+05:30",
                                "end" => "2071-01-26T20:45:22+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2071-01-26T20:45:22+05:30",
                                "end" => "2071-07-09T17:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 102,
                        "name" => "Ketu",
                        "start" => "2071-07-09T17:16:52+05:30",
                        "end" => "2072-09-07T20:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2071-07-09T17:16:52+05:30",
                                "end" => "2071-08-03T13:51:22+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2071-08-03T13:51:22+05:30",
                                "end" => "2071-10-13T14:21:22+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2071-10-13T14:21:22+05:30",
                                "end" => "2071-11-03T21:42:22+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2071-11-03T21:42:22+05:30",
                                "end" => "2071-12-09T09:57:22+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2071-12-09T09:57:22+05:30",
                                "end" => "2072-01-03T06:31:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2072-01-03T06:31:52+05:30",
                                "end" => "2072-03-07T04:34:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2072-03-07T04:34:52+05:30",
                                "end" => "2072-05-03T00:10:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2072-05-03T00:10:52+05:30",
                                "end" => "2072-07-09T11:27:22+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2072-07-09T11:27:22+05:30",
                                "end" => "2072-09-07T20:16:52+05:30"
                            ]
                        ]
                    ]
                ]
            ],
            [
                "id" => 0,
                "name" => "Sun",
                "start" => "2072-09-07T20:16:52+05:30",
                "end" => "2078-09-08T08:16:52+05:30",
                "antardasha" => [
                    [
                        "id" => 0,
                        "name" => "Sun",
                        "start" => "2072-09-07T20:16:52+05:30",
                        "end" => "2072-12-26T10:04:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2072-09-07T20:16:52+05:30",
                                "end" => "2072-09-13T07:46:16+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2072-09-13T07:46:16+05:30",
                                "end" => "2072-09-22T10:55:16+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2072-09-22T10:55:16+05:30",
                                "end" => "2072-09-28T20:19:34+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2072-09-28T20:19:34+05:30",
                                "end" => "2072-10-15T06:47:46+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2072-10-15T06:47:46+05:30",
                                "end" => "2072-10-29T21:26:10+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2072-10-29T21:26:10+05:30",
                                "end" => "2072-11-16T05:49:16+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2072-11-16T05:49:16+05:30",
                                "end" => "2072-12-01T18:22:34+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2072-12-01T18:22:34+05:30",
                                "end" => "2072-12-08T03:46:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2072-12-08T03:46:52+05:30",
                                "end" => "2072-12-26T10:04:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 1,
                        "name" => "Moon",
                        "start" => "2072-12-26T10:04:52+05:30",
                        "end" => "2073-06-27T01:04:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2072-12-26T10:04:52+05:30",
                                "end" => "2073-01-10T15:19:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2073-01-10T15:19:52+05:30",
                                "end" => "2073-01-21T07:00:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2073-01-21T07:00:22+05:30",
                                "end" => "2073-02-17T16:27:22+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2073-02-17T16:27:22+05:30",
                                "end" => "2073-03-14T00:51:22+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2073-03-14T00:51:22+05:30",
                                "end" => "2073-04-11T22:49:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2073-04-11T22:49:52+05:30",
                                "end" => "2073-05-07T19:45:22+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2073-05-07T19:45:22+05:30",
                                "end" => "2073-05-18T11:25:52+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2073-05-18T11:25:52+05:30",
                                "end" => "2073-06-17T21:55:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2073-06-17T21:55:52+05:30",
                                "end" => "2073-06-27T01:04:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 4,
                        "name" => "Mars",
                        "start" => "2073-06-27T01:04:52+05:30",
                        "end" => "2073-11-01T21:10:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2073-06-27T01:04:52+05:30",
                                "end" => "2073-07-04T12:03:13+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2073-07-04T12:03:13+05:30",
                                "end" => "2073-07-23T16:16:07+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2073-07-23T16:16:07+05:30",
                                "end" => "2073-08-09T17:20:55+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2073-08-09T17:20:55+05:30",
                                "end" => "2073-08-29T23:07:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2073-08-29T23:07:52+05:30",
                                "end" => "2073-09-17T01:46:43+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2073-09-17T01:46:43+05:30",
                                "end" => "2073-09-24T12:45:04+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2073-09-24T12:45:04+05:30",
                                "end" => "2073-10-15T20:06:04+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2073-10-15T20:06:04+05:30",
                                "end" => "2073-10-22T05:30:22+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2073-10-22T05:30:22+05:30",
                                "end" => "2073-11-01T21:10:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 101,
                        "name" => "Rahu",
                        "start" => "2073-11-01T21:10:52+05:30",
                        "end" => "2074-09-26T14:34:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2073-11-01T21:10:52+05:30",
                                "end" => "2073-12-21T04:35:28+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2073-12-21T04:35:28+05:30",
                                "end" => "2074-02-03T00:30:40+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2074-02-03T00:30:40+05:30",
                                "end" => "2074-03-27T01:39:58+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2074-03-27T01:39:58+05:30",
                                "end" => "2074-05-12T15:19:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2074-05-12T15:19:52+05:30",
                                "end" => "2074-05-31T19:32:46+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2074-05-31T19:32:46+05:30",
                                "end" => "2074-07-25T14:26:46+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2074-07-25T14:26:46+05:30",
                                "end" => "2074-08-11T00:54:58+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2074-08-11T00:54:58+05:30",
                                "end" => "2074-09-07T10:21:58+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2074-09-07T10:21:58+05:30",
                                "end" => "2074-09-26T14:34:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 5,
                        "name" => "Jupiter",
                        "start" => "2074-09-26T14:34:52+05:30",
                        "end" => "2075-07-15T19:22:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2074-09-26T14:34:52+05:30",
                                "end" => "2074-11-04T13:37:16+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2074-11-04T13:37:16+05:30",
                                "end" => "2074-12-20T19:58:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2074-12-20T19:58:52+05:30",
                                "end" => "2075-01-31T05:27:40+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2075-01-31T05:27:40+05:30",
                                "end" => "2075-02-17T06:32:28+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2075-02-17T06:32:28+05:30",
                                "end" => "2075-04-06T23:20:28+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2075-04-06T23:20:28+05:30",
                                "end" => "2075-04-21T13:58:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2075-04-21T13:58:52+05:30",
                                "end" => "2075-05-15T22:22:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2075-05-15T22:22:52+05:30",
                                "end" => "2075-06-01T23:27:40+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2075-06-01T23:27:40+05:30",
                                "end" => "2075-07-15T19:22:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 6,
                        "name" => "Saturn",
                        "start" => "2075-07-15T19:22:52+05:30",
                        "end" => "2076-06-26T19:04:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2075-07-15T19:22:52+05:30",
                                "end" => "2075-09-08T17:56:01+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2075-09-08T17:56:01+05:30",
                                "end" => "2075-10-27T21:41:28+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2075-10-27T21:41:28+05:30",
                                "end" => "2075-11-17T03:28:25+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2075-11-17T03:28:25+05:30",
                                "end" => "2076-01-13T23:25:25+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2076-01-13T23:25:25+05:30",
                                "end" => "2076-01-31T07:48:31+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2076-01-31T07:48:31+05:30",
                                "end" => "2076-02-29T05:47:01+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2076-02-29T05:47:01+05:30",
                                "end" => "2076-03-20T11:33:58+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2076-03-20T11:33:58+05:30",
                                "end" => "2076-05-11T12:43:16+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2076-05-11T12:43:16+05:30",
                                "end" => "2076-06-26T19:04:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 2,
                        "name" => "Mercury",
                        "start" => "2076-06-26T19:04:52+05:30",
                        "end" => "2077-05-03T06:10:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2076-06-26T19:04:52+05:30",
                                "end" => "2076-08-09T18:39:13+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2076-08-09T18:39:13+05:30",
                                "end" => "2076-08-27T21:18:04+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2076-08-27T21:18:04+05:30",
                                "end" => "2076-10-18T15:09:04+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2076-10-18T15:09:04+05:30",
                                "end" => "2076-11-03T03:42:22+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2076-11-03T03:42:22+05:30",
                                "end" => "2076-11-29T00:37:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2076-11-29T00:37:52+05:30",
                                "end" => "2076-12-17T03:16:43+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2076-12-17T03:16:43+05:30",
                                "end" => "2077-02-01T16:56:37+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2077-02-01T16:56:37+05:30",
                                "end" => "2077-03-15T02:25:25+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2077-03-15T02:25:25+05:30",
                                "end" => "2077-05-03T06:10:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 102,
                        "name" => "Ketu",
                        "start" => "2077-05-03T06:10:52+05:30",
                        "end" => "2077-09-08T02:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2077-05-03T06:10:52+05:30",
                                "end" => "2077-05-10T17:09:13+05:30"
                            ],
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2077-05-10T17:09:13+05:30",
                                "end" => "2077-06-01T00:30:13+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2077-06-01T00:30:13+05:30",
                                "end" => "2077-06-07T09:54:31+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2077-06-07T09:54:31+05:30",
                                "end" => "2077-06-18T01:35:01+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2077-06-18T01:35:01+05:30",
                                "end" => "2077-06-25T12:33:22+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2077-06-25T12:33:22+05:30",
                                "end" => "2077-07-14T16:46:16+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2077-07-14T16:46:16+05:30",
                                "end" => "2077-07-31T17:51:04+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2077-07-31T17:51:04+05:30",
                                "end" => "2077-08-20T23:38:01+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2077-08-20T23:38:01+05:30",
                                "end" => "2077-09-08T02:16:52+05:30"
                            ]
                        ]
                    ],
                    [
                        "id" => 3,
                        "name" => "Venus",
                        "start" => "2077-09-08T02:16:52+05:30",
                        "end" => "2078-09-08T08:16:52+05:30",
                        "pratyantardasha" => [
                            [
                                "id" => 3,
                                "name" => "Venus",
                                "start" => "2077-09-08T02:16:52+05:30",
                                "end" => "2077-11-07T23:16:52+05:30"
                            ],
                            [
                                "id" => 0,
                                "name" => "Sun",
                                "start" => "2077-11-07T23:16:52+05:30",
                                "end" => "2077-11-26T05:34:52+05:30"
                            ],
                            [
                                "id" => 1,
                                "name" => "Moon",
                                "start" => "2077-11-26T05:34:52+05:30",
                                "end" => "2077-12-26T16:04:52+05:30"
                            ],
                            [
                                "id" => 4,
                                "name" => "Mars",
                                "start" => "2077-12-26T16:04:52+05:30",
                                "end" => "2078-01-16T23:25:52+05:30"
                            ],
                            [
                                "id" => 101,
                                "name" => "Rahu",
                                "start" => "2078-01-16T23:25:52+05:30",
                                "end" => "2078-03-12T18:19:52+05:30"
                            ],
                            [
                                "id" => 5,
                                "name" => "Jupiter",
                                "start" => "2078-03-12T18:19:52+05:30",
                                "end" => "2078-04-30T11:07:52+05:30"
                            ],
                            [
                                "id" => 6,
                                "name" => "Saturn",
                                "start" => "2078-04-30T11:07:52+05:30",
                                "end" => "2078-06-27T07:04:52+05:30"
                            ],
                            [
                                "id" => 2,
                                "name" => "Mercury",
                                "start" => "2078-06-27T07:04:52+05:30",
                                "end" => "2078-08-18T00:55:52+05:30"
                            ],
                            [
                                "id" => 102,
                                "name" => "Ketu",
                                "start" => "2078-08-18T00:55:52+05:30",
                                "end" => "2078-09-08T08:16:52+05:30"
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];
    public function testProcess()
    {
        $datetime = new DateTime(self::INPUT['datetime']);
        $tz = $datetime->getTimezone();
        $location = new Location(self::INPUT['latitude'], self::INPUT['longitude'], 0, $tz);
        $client = $this->setClient();

        $basic_result = self::EXPECTED_OUTPUT;
        unset($basic_result['dasha_periods'], $basic_result['mangal_dosha']['has_exception'], $basic_result['mangal_dosha']['type'], $basic_result['mangal_dosha']['exceptions'], $basic_result['mangal_dosha']['remedies']);
        $nakshatra_details = $basic_result['nakshatra_details'];
        $nakshatra_lord = new Planet($nakshatra_details['nakshatra']['lord']['id'], $nakshatra_details['nakshatra']['lord']['name'], $nakshatra_details['nakshatra']['lord']['vedic_name']);
        $nakshatra = new Nakshatra($nakshatra_details['nakshatra']['id'], $nakshatra_details['nakshatra']['name'], $nakshatra_lord, $nakshatra_details['nakshatra']['pada']);
        $nakshatra_object = (object)$nakshatra_details['nakshatra'];
        $nakshatra_object->lord = (object)$nakshatra_details['nakshatra']['lord'];

        $chandra_rasi_lord = new Planet($nakshatra_details['chandra_rasi']['lord']['id'], $nakshatra_details['chandra_rasi']['lord']['name'], $nakshatra_details['chandra_rasi']['lord']['vedic_name']);
        $chandra_rasi = new Rasi($nakshatra_details['chandra_rasi']['id'], $nakshatra_details['chandra_rasi']['name'], $chandra_rasi_lord);
        $chandra_rasi_object = (object)$nakshatra_details['chandra_rasi'];
        $chandra_rasi_object->lord = (object)$nakshatra_details['chandra_rasi']['lord'];

        $soorya_rasi_lord = new Planet($nakshatra_details['soorya_rasi']['lord']['id'], $nakshatra_details['soorya_rasi']['lord']['name'], $nakshatra_details['soorya_rasi']['lord']['vedic_name']);
        $soorya_rasi = new Rasi($nakshatra_details['soorya_rasi']['id'], $nakshatra_details['soorya_rasi']['name'], $soorya_rasi_lord);
        $soorya_rasi_object = (object)$nakshatra_details['soorya_rasi'];
        $soorya_rasi_object->lord = (object)$nakshatra_details['soorya_rasi']['lord'];

        $zodiac = new Zodiac($nakshatra_details['zodiac']['id'], $nakshatra_details['zodiac']['name']);
        $zodiac_object = (object)$nakshatra_details['zodiac'];

        $additional_info = new NakshatraInfo($nakshatra_details['additional_info']['deity'], $nakshatra_details['additional_info']['ganam'], $nakshatra_details['additional_info']['symbol'], $nakshatra_details['additional_info']['animal_sign'], $nakshatra_details['additional_info']['nadi'], $nakshatra_details['additional_info']['color'], $nakshatra_details['additional_info']['best_direction'], $nakshatra_details['additional_info']['syllables'], $nakshatra_details['additional_info']['birth_stone'], $nakshatra_details['additional_info']['gender'], $nakshatra_details['additional_info']['planet'], $nakshatra_details['additional_info']['enemy_yoni']);
        $additional_info_object = (object)$nakshatra_details['additional_info'];

        $expected_basic_mangal_dosha_result = new BasicMangalDoshaResult($basic_result['mangal_dosha']['has_dosha'], $basic_result['mangal_dosha']['description']);
        $mangal_dosha_object = (object)$basic_result['mangal_dosha'];

        $yoga_details = $yoga_detail_object = [];

        foreach ($basic_result['yoga_details'] as $yoga) {
            $yoga_details[] = new BasicYogaResult($yoga['name'], $yoga['description']);
            unset($yoga['yoga_list']);
            $yoga_detail_object[] = (object)$yoga;
        }
        $expected_nakshatra_details = new NakshatraResult($nakshatra, $chandra_rasi, $soorya_rasi, $zodiac, $additional_info);

        $expected_basic_result = new BasicKundliResult($expected_nakshatra_details, $expected_basic_mangal_dosha_result, $yoga_details);

        $expected_basic_result->setRawResponse((object)[
                'nakshatra_details' => (object)[
                    'nakshatra' => $nakshatra_object,
                    'chandra_rasi' => $chandra_rasi_object,
                    'soorya_rasi' => $soorya_rasi_object,
                    'zodiac' => $zodiac_object,
                    'additional_info' => $additional_info_object,
                ],
                'mangal_dosha' => $mangal_dosha_object,
                'yoga_details' => $yoga_detail_object,
            ]
        );
        $method = new Kundli($client);
        $basic_test_result = $method->process($location, $datetime);

        $this->assertEquals($expected_basic_result, $basic_test_result);

        $advanced_test_result = $method->process($location, $datetime, true);
        $advanced_result = self::EXPECTED_OUTPUT;

        $expected_advanced_mangal_dosha_result = new AdvancedMangalDoshaResult(
            $advanced_result['mangal_dosha']['has_dosha'],
            $advanced_result['mangal_dosha']['description'],
            $advanced_result['mangal_dosha']['has_exception'],
            $advanced_result['mangal_dosha']['type'],
            $advanced_result['mangal_dosha']['exceptions'],
            $advanced_result['mangal_dosha']['remedies']
        );
        $advanced_mangal_dosha_object = (object)$advanced_result['mangal_dosha'];

        $advanced_yoga_result = $advanced_yoga_object = [];

        foreach ($advanced_result['yoga_details'] as $yoga) {
            $yoga_list = $yoga_list_object = [];
            foreach ($yoga['yoga_list'] as $details) {
                $yoga_list[] = new Yoga($details['name'], $details['has_yoga'], $details['description']);
                $yoga_list_object[] = (object)$details;
            }
            $advanced_yoga_result[] = new AdvancedYogaResult($yoga['name'], $yoga['description'], $yoga_list);
            $yoga_object = (object)$yoga;
            $yoga_object->yoga_list = $yoga_list_object;
            $advanced_yoga_object[] = $yoga_object;
        }
        $dasha_result = $dasha_object = [];
        foreach ($advanced_result['dasha_periods'] as $dasha_period) {
            $antardasha_result = $antardasha_object = null;
            foreach ($dasha_period['antardasha'] as $antardasha) {
                $pratyantardasha_result = $pratyantardasha_object = [];
                foreach ($antardasha['pratyantardasha'] as $pratyantardasha) {
                    $start = new DateTimeImmutable($pratyantardasha['start']);
                    $end = new DateTimeImmutable($pratyantardasha['end']);
                    $pratyantardasha_result[] = new Pratyantardasha($pratyantardasha['id'], $pratyantardasha['name'], $start, $end);
                    $pratyantardasha_object[] = (object)$pratyantardasha;
                }
                $start = new DateTimeImmutable($antardasha['start']);
                $end = new DateTimeImmutable($antardasha['end']);
                $antardasha_result[] = new Antardasha($antardasha['id'], $antardasha['name'], $start, $end, $pratyantardasha_result);
                $object = (object)$antardasha;
                $object->pratyantardasha = $pratyantardasha_object;
                $antardasha_object[] = (object)$object;
            }
            $start = new DateTimeImmutable($dasha_period['start']);
            $end = new DateTimeImmutable($dasha_period['end']);

            $dasha_result[] = new DashaPeriod($dasha_period['id'], $dasha_period['name'], $start, $end, $antardasha_result);
            $object = (object)$dasha_period;
            $object->antardasha = $antardasha_object;
            $dasha_object[] = $object;
        }
        $expected_advanced_result = new AdvancedKundliResult($expected_nakshatra_details, $expected_advanced_mangal_dosha_result, $advanced_yoga_result, $dasha_result);
        $expected_advanced_result->setRawResponse((object)[
            'nakshatra_details' => (object)[
                'nakshatra' => $nakshatra_object,
                'chandra_rasi' => $chandra_rasi_object,
                'soorya_rasi' => $soorya_rasi_object,
                'zodiac' => $zodiac_object,
                'additional_info' => $additional_info_object,
            ],
            'mangal_dosha' => $advanced_mangal_dosha_object,
            'yoga_details' => $advanced_yoga_object,
            'dasha_periods' => $dasha_object
        ]
        );
        $this->assertEquals($expected_advanced_result, $advanced_test_result);

    }

}
