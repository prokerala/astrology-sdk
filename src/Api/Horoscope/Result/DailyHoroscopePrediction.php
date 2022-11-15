<?php

declare(strict_types=1);

namespace Prokerala\Api\Horoscope\Result;

class DailyHoroscopePrediction
{
    /**
     * @param string $signName
     * @param int    $signId
     * @param string $prediction
     */
    public function __construct(private $signName, private $signId, private \DateTimeInterface $date, private $prediction)
    {
    }

    /**
     * @return string
     */
    public function getSignName()
    {
        return $this->signName;
    }

    /**
     * @return int
     */
    public function getSignId()
    {
        return $this->signId;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getPrediction()
    {
        return $this->prediction;
    }
}
