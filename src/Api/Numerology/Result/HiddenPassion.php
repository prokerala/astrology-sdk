<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class HiddenPassion implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var HiddenPassionNumber
     */
    private $hiddenPassionNumber;
    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param HiddenPassionNumber $hiddenPassionNumber
     * @param NameChart $nameChart
     */
    public function __construct(HiddenPassionNumber $hiddenPassionNumber, NameChart $nameChart) {

        $this->hiddenPassionNumber = $hiddenPassionNumber;
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
     * @return HiddenPassionNumber
     */
    public function getHiddenPassionNumber(): HiddenPassionNumber
    {
        return $this->hiddenPassionNumber;
    }
}
