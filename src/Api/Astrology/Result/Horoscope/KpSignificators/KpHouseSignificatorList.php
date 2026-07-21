<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\KpSignificators;



use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Astrology\Result\Element\Bhava;
use Prokerala\Api\Astrology\Result\Element\Planet;

final class KpHouseSignificatorList implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @param \Prokerala\Api\Astrology\Result\Element\Planet[] $cuspNakshatraOccupants
     * @param \Prokerala\Api\Astrology\Result\Element\Planet[] $cuspOccupants
     * @param \Prokerala\Api\Astrology\Result\Element\Planet[] $cuspOwnerNakshatraPlanets
     */
    public function __construct(
        private Bhava $house,
        private array $cuspNakshatraOccupants,
        private array $cuspOccupants,
        private array $cuspOwnerNakshatraPlanets,
        private Planet $cuspOwner,
    ) {
    }

    public function getHouse(): Bhava
    {
        return $this->house;
    }

    /**
     * @return Planet[]
     */
    public function getCuspNakshatraOccupants(): array
    {
        return $this->cuspNakshatraOccupants;
    }

    /**
     * @return Planet[]
     */
    public function getCuspOccupants(): array
    {
        return $this->cuspOccupants;
    }

    /**
     * @return Planet[]
     */
    public function getCuspOwnerNakshatraPlanets(): array
    {
        return $this->cuspOwnerNakshatraPlanets;
    }

    public function getCuspOwner(): Planet
    {
        return $this->cuspOwner;
    }
}
