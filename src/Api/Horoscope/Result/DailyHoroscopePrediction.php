<?php

declare(strict_types=1);

namespace Prokerala\Api\Horoscope\Result;

class DailyHoroscopePrediction
{
    /**
     * @var string
     */
    private $signName;

    /**
     * @var int
     */
    private $signId;

    /**
     * @var \DateTimeImmutable
     */
    private $date;

    /**
     * @var string
     */
    private $prediction;

    /**
     * @param string $signName
     * @param int $signId
     * @param \DateTimeImmutable $date
     * @param string $prediction
     */
    public function __construct($signName, $signId, \DateTimeImmutable $date, $prediction)
    {
        $this->signName = $signName;
        $this->signId = $signId;
        $this->date = $date;
        $this->prediction = $prediction;
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
