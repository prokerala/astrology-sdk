<?php

namespace Prokerala\Api\Horoscope\Entity;

use Prokerala\Api\Astrology\Traits\StringableTrait;

class Prediction
{
    use StringableTrait;
    private string $type;
    private string $prediction;
    private string $seek;
    private string $challenge;
    private string $insight;

    public function __construct(string $type, string $prediction, string $seek, string $challenge, string $insight)
    {
        $this->type = $type;
        $this->prediction = $prediction;
        $this->seek = $seek;
        $this->challenge = $challenge;
        $this->insight = $insight;
    }

    public function getType(): string
    {
        return $this->type;
    }
    public function getPrediction(): string
    {
        return $this->prediction;
    }
    public function getSeek(): string
    {
        return $this->seek;
    }
    public function getChallenge(): string
    {
        return $this->challenge;
    }
    public function getInsight(): string
    {
        return $this->insight;
    }
}

