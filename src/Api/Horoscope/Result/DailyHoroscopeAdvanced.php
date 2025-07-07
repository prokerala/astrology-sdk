<?php



namespace Prokerala\Api\Horoscope\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Horoscope\Entity\PlanetAspect;
use Prokerala\Api\Horoscope\Entity\Prediction;
use Prokerala\Api\Horoscope\Entity\Transit;
use Prokerala\Api\Horoscope\Entity\Zodiac;
use Prokerala\Api\Horoscope\Entity\ZodiacInfo;

class DailyHoroscopeAdvanced implements ResultInterface
{
    use RawResponseTrait;

    private Zodiac $sign;
    private ZodiacInfo $signInfo;
    /** @var Prediction[] */
    private array $predictions;
    /** @var PlanetAspect[] */
    private array $aspects;
    /** @var Transit[] */
    private array $transits;

    /**
     * @param Zodiac $sign
     * @param ZodiacInfo $signInfo
     * @param \Prokerala\Api\Horoscope\Entity\Prediction[] $predictions
     * @param \Prokerala\Api\Horoscope\Entity\PlanetAspect[] $aspects
     * @param \Prokerala\Api\Horoscope\Entity\Transit[] $transits
     */
    public function __construct(Zodiac $sign, ZodiacInfo $signInfo, array $predictions, array $aspects, array $transits)
    {
        $this->sign = $sign;
        $this->signInfo = $signInfo;
        $this->predictions = $predictions;
        $this->aspects = $aspects;
        $this->transits = $transits;
    }

    public function getSign(): Zodiac
    {
        return $this->sign;
    }

    public function getSignInfo(): ZodiacInfo
    {
        return $this->signInfo;
    }

    /**
     * @return Prediction[]
     */
    public function getPredictions(): array
    {
        return $this->predictions;
    }

    /**
     * @return PlanetAspect[]
     */
    public function getAspects(): array
    {
        return $this->aspects;
    }

    /**
     * @return Transit[]
     */
    public function getTransits(): array
    {
        return $this->transits;
    }
}
