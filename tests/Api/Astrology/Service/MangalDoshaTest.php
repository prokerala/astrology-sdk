<?php

namespace Prokerala\Tests\Api\Astrology\Service;

use DateTime;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Service\MangalDosha;
use Prokerala\Tests\Api\Astrology\Traits\AuthenticationTrait;
use Prokerala\Tests\BaseTestCase;
use Prokerala\Api\Astrology\Result\Horoscope\AdvancedMangalDosha as AdvancedMangalDoshaResult;
use Prokerala\Api\Astrology\Result\Horoscope\MangalDosha as BasicMangalDoshaResult;

class MangalDoshaTest extends BaseTestCase
{
    use AuthenticationTrait;

    const INPUT = [
        'datetime' => '1967-08-29T09:00:00+05:30',
        'latitude' => '19.0821978',
        'longitude' => '72.7411014', // Mumbai
    ];

    const EXPECTED_RESULT = [
        'basic' => [
            "has_dosha" => true,
            "description" => "The person is Manglik. Mars is positioned in the 2nd house, it is mild Manglik Dosha"
        ],
        'advanced' => [
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
    ];

    public function testProcess()
    {
        $datetime = new DateTime(self::INPUT['datetime']);
        $tz = $datetime->getTimezone();
        $location = new Location(self::INPUT['latitude'], self::INPUT['longitude'], 0, $tz);
        $client = $this->setClient();

        $mangalDosha = new MangalDosha($client);
        $test_basic_result = $mangalDosha->process($location, $datetime);

        $basic_result = self::EXPECTED_RESULT['basic'];

        $expected_basic_result = new BasicMangalDoshaResult($basic_result['has_dosha'], $basic_result['description']);
        $expected_basic_result->setRawResponse((object)$basic_result);

        $this->assertEquals($expected_basic_result, $test_basic_result);

        $test_advanced_result = $mangalDosha->process($location, $datetime, true);

        $advanced_result = self::EXPECTED_RESULT['advanced'];

        $expected_advanced_result = new AdvancedMangalDoshaResult($advanced_result['has_dosha'], $advanced_result['description'], $advanced_result['has_exception'], $advanced_result['type'], $advanced_result['exceptions'], $advanced_result['remedies']);
        $expected_advanced_result->setRawResponse((object)$advanced_result);

        $this->assertEquals($expected_advanced_result, $test_advanced_result);


    }
}
