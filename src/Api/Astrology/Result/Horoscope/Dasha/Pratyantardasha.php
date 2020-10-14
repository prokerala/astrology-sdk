<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\Dasha;

use DateTimeInterface;

class Pratyantardasha
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
     * Pratyantardasha constructor.
     * @param int $id
     * @param string $name
     * @param DateTimeInterface $start
     * @param DateTimeInterface $end
     */
    public function __construct(
        $id,
        $name,
        DateTimeInterface $start,
        DateTimeInterface $end
    ) {


        $this->id = $id;
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
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


}
