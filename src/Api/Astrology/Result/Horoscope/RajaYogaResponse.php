<?php

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class RajaYogaResponse implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Yoga\BasicRajaYogaResult[]
     */
    private array $yogaList;

    /**
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Yoga\BasicRajaYogaResult[] $yogaList
     */
    public function __construct(
        array $yogaList
    ) {
        $this->yogaList = $yogaList;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Yoga\BasicRajaYogaResult[]
     */
    public function getYogaList(): array
    {
        return $this->yogaList;
    }
}
