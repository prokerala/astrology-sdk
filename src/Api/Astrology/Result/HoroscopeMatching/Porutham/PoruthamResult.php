<?php

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham;

class PoruthamResult
{

    /**
     * @var string
     */
    private $result;
    /**
     * @var float
     */
    private $point;
    /**
     * @var string
     */
    private $comment;

    /**
     * PoruthamResult constructor.
     * @param string $result
     * @param float $point
     * @param string $comment
     */
    public function __construct($result, $point, $comment)
    {

        $this->result = $result;
        $this->point = $point;
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return float
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

}
