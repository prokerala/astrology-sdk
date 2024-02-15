<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\Horoscope\Astagavarga\SarvashtakavargaResult as SarvashtakavargaResponse;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SarvashtakavargaResult
{
    use RawResponseTrait;
    private SarvashtakavargaResponse $sarvashtakavarga;

    public function __construct(SarvashtakavargaResponse $sarvashtakavarga)
    {
        $this->sarvashtakavarga = $sarvashtakavarga;
    }

    public function getSarvashtakavarga(): SarvashtakavargaResponse
    {
        return $this->sarvashtakavarga;
    }
}
