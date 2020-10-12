<?php
namespace Prokerala\Api\Astrology\Result\Panchang;

class Choghadiya
{
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Choghadiya\Period[]
     */
    private $data;

    /**
     * Choghadiya constructor.
     * @param \Prokerala\Api\Astrology\Result\Panchang\Choghadiya\Period[] $data
     */
    public function __construct(array $data)
    {

        $this->data = $data;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Choghadiya\Period[]
     */
    public function getData()
    {
        return $this->data;
    }
}
