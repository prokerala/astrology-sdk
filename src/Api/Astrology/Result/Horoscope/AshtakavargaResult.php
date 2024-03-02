<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga\AshtakavargaResult as AshtakavargaResponse;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class AshtakavargaResult implements ResultInterface
{
    use RawResponseTrait;

    private AshtakavargaResponse $ashtakavarga;

    public function __construct(AshtakavargaResponse $ashtakavarga)
    {
        $this->ashtakavarga = $ashtakavarga;
    }

    public function getAshtakavarga(): AshtakavargaResponse
    {
        return $this->ashtakavarga;
    }
}
