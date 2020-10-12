<?php
namespace Prokerala\Api\Astrology\Result\Panchang\Choghadiya;

class Period
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
     * @var string
     */
    private $type;
    /**
     * @var string|null
     */
    private $vela;
    /**
     * @var bool
     */
    private $isDay;
    /**
     * @var string
     */
    private $start;
    /**
     * @var string
     */
    private $end;

    /**
     * Period constructor.
     * @param int $id
     * @param string $name
     * @param string $type
     * @param string|null $vela
     * @param bool $isDay
     * @param string $start
     * @param string $end
     */
    public function __construct(
        $id,
        $name,
        $type,
        $vela,
        $isDay,
        $start,
        $end
    )
    {


        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->vela = $vela;
        $this->isDay = $isDay;
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getVela()
    {
        return $this->vela;
    }

    /**
     * @return bool
     */
    public function getIsDay()
    {
        return $this->isDay;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }


}
