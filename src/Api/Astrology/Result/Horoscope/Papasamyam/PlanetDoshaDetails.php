<?php
namespace Prokerala\Api\Astrology\Result\Horoscope\Papasamyam;


/**
 * Defines PlanetDoshaDetails
 */
class PlanetDoshaDetails
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $position;
    /**
     * @var bool
     */
    private $hasDosha;

    /**
     * PlanetDoshaDetails constructor.
     * @param int $id
     * @param string $name
     * @param int $position
     * @param bool $hasDosha
     */
    public function __construct(
        $id,
        $name,
        $position,
        $hasDosha
    ) {

        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
        $this->hasDosha = $hasDosha;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function getHasDosha()
    {
        return $this->hasDosha;
    }
}

