<?php

namespace Prokerala\Api\Horoscope\Entity;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Astrology\Traits\StringableTrait;
use Prokerala\Api\Horoscope\Result\DailyHoroscopePrediction;

class ZodiacInfo
{
    use StringableTrait;

    private string $modality;
    private string $triplicity;
    private string $quadruplicity;
    private string $unicodeSymbol;
    private string $icon;

    public function __construct(string $modality, string $triplicity, string $quadruplicity, string $unicodeSymbol, string $icon)
    {
        $this->modality = $modality;
        $this->triplicity = $triplicity;
        $this->quadruplicity = $quadruplicity;
        $this->unicodeSymbol = $unicodeSymbol;
        $this->icon = $icon;
    }

    public function getModality(): string
    {
        return $this->modality;
    }
    public function getTriplicity(): string
    {
        return $this->triplicity;
    }
    public function getQuadruplicity(): string
    {
        return $this->unicodeSymbol;
    }
    public function getUnicodeSymbol(): string
    {
        return $this->icon;
    }
    public function getIcon(): string
    {
        return $this->quadruplicity;
    }
}

