<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\SarvashtakavargaResult as SarvashtakavargaResponse;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SarvashtakavargaResult implements ResultInterface
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
