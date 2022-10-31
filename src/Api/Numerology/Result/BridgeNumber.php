<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;
use Prokerala\Api\Numerology\Result\BridgeNumber\GapBetweenExpressionAndHeartDesire;
use Prokerala\Api\Numerology\Result\BridgeNumber\GapBetweenHeartDesireAndPersonality;
use Prokerala\Api\Numerology\Result\BridgeNumber\GapBetweenLifePathAndExpression;
use Prokerala\Api\Numerology\Result\BridgeNumber\GapBetweenPersonalityAndLifePath;

class BridgeNumber implements JsonSerializable
{
    /**
     * @var GapBetweenLifePathAndExpression
     */
    private $gapBetweenLifePathAndExpression;
    /**
     * @var GapBetweenHeartDesireAndPersonality
     */
    private $gapBetweenHeartDesireAndPersonality;
    /**
     * @var GapBetweenExpressionAndHeartDesire
     */
    private $gapBetweenExpressionAndHeartDesire;
    /**
     * @var GapBetweenPersonalityAndLifePath
     */
    private $gapBetweenPersonalityAndLifePath;
    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param GapBetweenLifePathAndExpression $gapBetweenLifePathAndExpression
     * @param GapBetweenHeartDesireAndPersonality $gapBetweenHeartDesireAndPersonality
     * @param GapBetweenExpressionAndHeartDesire $gapBetweenExpressionAndHeartDesire
     * @param GapBetweenPersonalityAndLifePath $gapBetweenPersonalityAndLifePath
     * @param NameChart $nameChart
     */
    public function __construct(
        $gapBetweenLifePathAndExpression,
        $gapBetweenHeartDesireAndPersonality,
        $gapBetweenExpressionAndHeartDesire,
        $gapBetweenPersonalityAndLifePath,
        $nameChart
    )
    {
        $this->gapBetweenLifePathAndExpression = $gapBetweenLifePathAndExpression;
        $this->gapBetweenHeartDesireAndPersonality = $gapBetweenHeartDesireAndPersonality;
        $this->gapBetweenExpressionAndHeartDesire = $gapBetweenExpressionAndHeartDesire;
        $this->gapBetweenPersonalityAndLifePath = $gapBetweenPersonalityAndLifePath;
        $this->nameChart = $nameChart;
    }

    /**
     * @return GapBetweenLifePathAndExpression
     */
    public function getGapBetweenLifePathExpression(): GapBetweenLifePathAndExpression
    {
        return $this->gapBetweenLifePathAndExpression;
    }

    /**
     * @return GapBetweenHeartDesireAndPersonality
     */
    public function getGapBetweenHeartDesirePersonality(): GapBetweenHeartDesireAndPersonality
    {
        return $this->gapBetweenHeartDesireAndPersonality;
    }

    /**
     * @return GapBetweenExpressionAndHeartDesire
     */
    public function getGapBetweenExpressionHeartDesire(): GapBetweenExpressionAndHeartDesire
    {
        return $this->gapBetweenExpressionAndHeartDesire;
    }

    /**
     * @return GapBetweenPersonalityAndLifePath
     */
    public function getGapBetweenPersonalityLifePath(): GapBetweenPersonalityAndLifePath
    {
        return $this->gapBetweenPersonalityAndLifePath;
    }

    public function jsonSerialize(): array
    {
        return [
            'lifePath_expression' => $this->gapBetweenLifePathAndExpression,
            'heartDesire_personality' => $this->gapBetweenHeartDesireAndPersonality,
            'expression_heartDesire' => $this->gapBetweenExpressionAndHeartDesire,
            'personality_lifePath' => $this->gapBetweenPersonalityAndLifePath,
            'name_chart' => $this->nameChart,
        ];
    }


    /**
     * @return NameChart
     */
    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }
}
