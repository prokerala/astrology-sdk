<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Numerology\Result\KarmicDebtNumber\Expression;
use Prokerala\Api\Numerology\Result\KarmicDebtNumber\HeartDesire;
use Prokerala\Api\Numerology\Result\KarmicDebtNumber\Personality;
use Prokerala\Api\Numerology\Result\KarmicDebtNumber\LifePath;

use JsonSerializable;

class KarmicDebt implements JsonSerializable
{
    /**
     * @var LifePath
     */
    private $lifePath;
    /**
     * @var Expression
     */
    private $expression;
    /**
     * @var HeartDesire
     */
    private $heartDesire;
    /**
     * @var Personality
     */
    private $personality;
    /**
     * @var Number|null
     */
    private $birthDay;
    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param LifePath $lifePath
     * @param Expression $expression
     * @param HeartDesire $heartDesire
     * @param Personality $personality
     * @param Number|null $birthDay
     * @param NameChart $nameChart
     */
    public function __construct(
         $lifePath,
         $expression,
         $heartDesire,
         $personality,
         $birthDay,
         $nameChart
    )
    {
         $this->lifePath = $lifePath;
         $this->expression = $expression;
         $this->heartDesire = $heartDesire;
         $this->personality = $personality;
         $this->birthDay = $birthDay;
         $this->nameChart = $nameChart;
    }


    /**
     * @return NameChart
     */
    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    /**
     * @return ?Number
     */
    public function getPersonality(): Personality
    {
        return $this->personality;
    }

    /**
     * @return ?Number
     */
    public function getBirthDay(): ?Number
    {
        return $this->birthDay;
    }

    /**
     * @return ?Number
     */
    public function getLifePath(): LifePath
    {
        return $this->lifePath;
    }

    /**
     * @return ?Number
     */
    public function getHeartDesire(): HeartDesire
    {
        return $this->heartDesire;
    }

    /**
     * @return ?Number
     */
    public function getExpression(): Expression
    {
        return $this->expression;
    }

    public function jsonSerialize(): array
    {
        return [
            'life_path' => $this->lifePath,
            'expression' => $this->expression,
            'heart_desire' => $this->heartDesire,
            'personality' => $this->personality,
            'name_chart' => $this->nameChart,
        ];
    }
}
