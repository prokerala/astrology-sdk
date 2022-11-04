<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Panchang\AuspiciousYoga;

class Combination
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $type
     * @param string $name
     */
    public function __construct(string $type, string $name)
    {
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
