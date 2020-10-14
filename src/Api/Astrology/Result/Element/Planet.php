<?php

namespace Prokerala\Api\Astrology\Result\Element;

use Prokerala\Api\Astrology\Traits\StringableTrait;

class Planet
{
    use StringableTrait;

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
    private $vedicName;

    /**
     * Lord constructor.
     * @param int $id
     * @param string $name
     * @param string $vedicName
     */
    public function __construct($id, $name, $vedicName)
    {

        $this->id = $id;
        $this->name = $name;
        $this->vedicName = $vedicName;
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
    public function getVedicName()
    {
        return $this->vedicName;
    }

}
