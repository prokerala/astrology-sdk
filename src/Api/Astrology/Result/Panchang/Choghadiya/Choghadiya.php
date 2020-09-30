<?php

namespace Prokerala\Api\Astrology\Result\Panchang\Choghadiya;

class Choghadiya
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
     * @var string
     */
    private $vela;
    /**
     * @var string
     */
    private $start;
    /**
     * @var string
     */
    private $end;

    /**
     * Choghadiya constructor.
     * @param int $id
     * @param string $name
     * @param string $type
     * @param string $vela
     * @param string $start
     * @param string $end
     */

    public function __construct($id, $name, $type, $vela, $start, $end)
    {

        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->vela = $vela;
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
     * @return string
     */
    public function getVela()
    {
        return $this->vela;
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
