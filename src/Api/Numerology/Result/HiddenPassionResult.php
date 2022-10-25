<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class HiddenPassionResult
{
    /**
     * @var Number $number
     */
    private $number;
    /**
     * @var NameResult $nameResult
     */
    private $nameResult;

    /**
     * @param Number $number
     * @param NameResult $nameResult
     */
    public function __construct($number, $nameResult) {
        $this->number = $number;
        $this->nameResult = $nameResult;
    }
    /**
     * @return Number
     */
    public function getNumber(): Number
    {
        return $this->number;
    }

    /**
     * @return NameResult
     */
    public function getNameResult(): NameResult
    {
        return $this->nameResult;
    }



    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
