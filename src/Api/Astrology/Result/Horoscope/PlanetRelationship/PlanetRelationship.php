<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\PlanetRelationship;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class PlanetRelationship implements ResultInterface
{
    use RawResponseTrait;


    /** @var PlanetRelation[] $naturalRelationship */
    private array $naturalRelationship;

    /** @var PlanetRelation[] $temporalRelationship */
    private array $temporalRelationship;

    /** @var PlanetRelation[] $compoundRelationship */
    private array $compoundRelationship;

    /**
     * @param PlanetRelation[] $naturalRelationship
     * @param PlanetRelation[] $temporalRelationship
     * @param PlanetRelation[] $compoundRelationship
     */
    public function __construct(
        array $naturalRelationship,
        array $temporalRelationship,
        array $compoundRelationship
    ) {
        $this->naturalRelationship = $naturalRelationship;
        $this->temporalRelationship = $temporalRelationship;
        $this->compoundRelationship = $compoundRelationship;
    }

     /**
     * @return PlanetRelation[]
     */
    public function getNaturalRelationship(): array
    {
        return $this->naturalRelationship;
    }

    /**
     * @return PlanetRelation[]
     */
    public function getTemporalRelationship(): array
    {
        return $this->temporalRelationship;
    }

    /**
     * @return PlanetRelation[]
     */
    public function getCompoundRelationship(): array
    {
        return $this->compoundRelationship;
    }
}
