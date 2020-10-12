<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Event;

class ChandraRasi
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
    private $lord;
    /**
     * @var string
     */
    private $lordEn;

    /**
     * ChandraRasi constructor.
     * @param int $id
     * @param string $name
     * @param string $lord
     * @param string $lordEn
     */
    public function __construct(
        $id,
        $name,
        $lord,
        $lordEn
    ) {


        $this->id = $id;
        $this->name = $name;
        $this->lord = $lord;
        $this->lordEn = $lordEn;
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
    public function getLord()
    {
        return $this->lord;
    }

    /**
     * @return string
     */
    public function getLordEn()
    {
        return $this->lordEn;
    }


}
