<?php

namespace Prokerala\Api\Astrology\Western\Result\AspectCharts;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SynastryChart implements ResultInterface
{
    use RawResponseTrait;
    private string $svg;
    public function __construct( string $svgImage)
    {
        $this->svg = $svgImage;
    }
    public function getChart(): string {
        return $this->svg;
    }
}
