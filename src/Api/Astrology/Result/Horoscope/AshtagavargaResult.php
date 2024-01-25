<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\Horoscope\Astagavarga\Ashtakavarga;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class AshtagavargaResult
{
    use RawResponseTrait;
    private Ashtakavarga $ashtakavarga;

    public function __construct(Ashtakavarga $ashtakavarga)
    {
        $this->ashtakavarga = $ashtakavarga;
    }

    public function getAshtakavarga(): Ashtakavarga
    {
        return $this->ashtakavarga;
    }
}
