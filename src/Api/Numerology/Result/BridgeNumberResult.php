<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class BridgeNumberResult implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var Number
     */
    private $GapBetweenLifePathExpression;
    /**
     * @var Number
     */
    private $GapBetweenHeartDesirePersonality;
    /**
     * @var Number
     */
    private $GapBetweenExpressionHeartDesire;
    /**
     * @var Number
     */
    private $GapBetweenPersonalityLifePath;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param int $id
     * @param string $title
     * @param Number $GapBetweenLifePathExpression
     * @param Number $GapBetweenHeartDesirePersonality
     * @param Number $GapBetweenExpressionHeartDesire
     * @param Number $GapBetweenPersonalityLifePath
     * @param NameResult $nameResult
     */
    public function __construct(
        $id,
        $title,
        $GapBetweenLifePathExpression,
        $GapBetweenHeartDesirePersonality,
        $GapBetweenExpressionHeartDesire,
        $GapBetweenPersonalityLifePath,
        $nameResult
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->GapBetweenLifePathExpression = $GapBetweenLifePathExpression;
        $this->GapBetweenHeartDesirePersonality = $GapBetweenHeartDesirePersonality;
        $this->GapBetweenExpressionHeartDesire = $GapBetweenExpressionHeartDesire;
        $this->GapBetweenPersonalityLifePath = $GapBetweenPersonalityLifePath;
        $this->nameResult = $nameResult;
    }

    /**
     * @return Number
     */
    public function getGapBetweenLifePathExpression(): Number
    {
        return $this->GapBetweenLifePathExpression;
    }

    /**
     * @return Number
     */
    public function getGapBetweenHeartDesirePersonality(): Number
    {
        return $this->GapBetweenHeartDesirePersonality;
    }

    /**
     * @return Number
     */
    public function getGapBetweenExpressionHeartDesire(): Number
    {
        return $this->GapBetweenExpressionHeartDesire;
    }

    /**
     * @return Number
     */
    public function getGapBetweenPersonalityLifePath(): Number
    {
        return $this->GapBetweenPersonalityLifePath;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'lifePath_expression' => $this->GapBetweenLifePathExpression,
            'heartDesire_personality' => $this->GapBetweenHeartDesirePersonality,
            'expression_heartDesire' => $this->GapBetweenExpressionHeartDesire,
            'personality_lifePath' => $this->GapBetweenPersonalityLifePath,
            'name_result' => $this->nameResult,
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return NameResult
     */
    public function getNameResult(): NameResult
    {
        return $this->nameResult;
    }
}
