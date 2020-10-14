<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope\Yoga;

class AdvancedYogaDetails
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var Yoga[]
     */
    private $yogaList;

    /**
     * AdvancedYogaDetails constructor.
     * @param string $name
     * @param string $description
     * @param Yoga[] $yogaList
     */
    public function __construct(
        $name,
        $description,
        array $yogaList
    ) {

        $this->name = $name;
        $this->description = $description;
        $this->yogaList = $yogaList;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Yoga[]
     */
    public function getYogaList()
    {
        return $this->yogaList;
    }
}
