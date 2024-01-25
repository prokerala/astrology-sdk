<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\Horoscope\Astagavarga\Sarvashtakavarga;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SarvashtakavargaResult
{
    use RawResponseTrait;
    private Sarvashtakavarga $sarvashtakavarga;

    public function __construct(Sarvashtakavarga $sarvashtakavarga)
    {
        $this->sarvashtakavarga = $sarvashtakavarga;
    }

    public function getSarvashtakavarga(): Sarvashtakavarga
    {
        return $this->sarvashtakavarga;
    }
}
