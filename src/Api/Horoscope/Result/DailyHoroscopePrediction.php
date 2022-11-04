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
     * @var ?int
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
     * @param null|int $signId
     */
    public function __construct(string $signName, int $signId, \DateTimeInterface $date, string $prediction)
    {
        $this->signName = $signName;
        $this->signId = $signId;
        $this->date = $date;
        $this->prediction = $prediction;
    }

    public function getSignName(): string
    {
        return $this->signName;
    }

    /**
     * @return int
     */
    public function getSignId(): ?int
    {
        return $this->signId;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function getPrediction(): string
    {
        return $this->prediction;
    }
}
