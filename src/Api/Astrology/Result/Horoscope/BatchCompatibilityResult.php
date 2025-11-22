<?php

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;


class BatchCompatibilityResult implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\BatchCompatibilityMessage[]
     */
    private array $batchCompatibility;

    /**
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\BatchCompatibilityMessage[] $batchCompatibility
     */
    public function __construct(array $batchCompatibility)
    {
        $this->batchCompatibility = $batchCompatibility;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\BatchCompatibilityMessage[]
     */
    public function getBatchCompatibility(): array
    {
        return $this->batchCompatibility;
    }
}


