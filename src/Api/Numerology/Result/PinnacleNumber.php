<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class PinnacleNumber
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var AgeNumber[]
     */
    private array $pinnacles;

    /**
     * @param string $name
     * @param AgeNumber[] $pinnacles
     */
    public function __construct(string $name, array $pinnacles)
    {
        $this->name = $name;
        $this->pinnacles = $pinnacles;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @return AgeNumber[]
     */
    public function getPinnacles(): array
    {
        return $this->pinnacles;
    }


}
