<?php
namespace Prokerala\Api\Astrology\Result\Event;
/**
 * Defines Karana
 */
class Karana
{
    /**
     * @var int
     */
    private $index;
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
    private $start;
    /**
     * @var string
     */
    private $end;

    /**
     * Karana constructor.
     * @param int $index
     * @param int $id
     * @param string $name
     * @param string $start
     * @param string $end
     */
    public function __construct(
        $index,
        $id,
        $name,
        $start,
        $end
    )
    {

        $this->index = $index;
        $this->id = $id;
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
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
