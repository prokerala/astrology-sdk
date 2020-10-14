<?php
namespace Prokerala\Api\Astrology\Result\Horoscope\Dasha;

use DateTimeInterface;

class Antardasha
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
     * @var DateTimeInterface
     */
    private $start;
    /**
     * @var DateTimeInterface
     */
    private $end;
    /**
     * @var Pratyantardasha[]
     */
    private $pratyantardasha;

    /**
     * Pratyantardasha constructor.
     * @param int $id
     * @param string $name
     * @param DateTimeInterface $start
     * @param DateTimeInterface $end
     * @param Pratyantardasha[] $pratyantardasha
     */
    public function __construct(
        $id,
        $name,
        DateTimeInterface $start,
        DateTimeInterface $end,
        array $pratyantardasha
    ) {


        $this->id = $id;
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
        $this->pratyantardasha = $pratyantardasha;
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
     * @return DateTimeInterface
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return DateTimeInterface
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return Pratyantardasha[]
     */
    public function getPratyantardasha()
    {
        return $this->pratyantardasha;
    }
}
