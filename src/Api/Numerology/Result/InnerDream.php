<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class InnerDream implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var InnerDreamNumber
     */
    private $innerDreamNumber;
    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param InnerDreamNumber $innerDreamNumber
     * @param NameChart $nameChart
     */
    public function __construct(InnerDreamNumber $innerDreamNumber, NameChart $nameChart) {

        $this->innerDreamNumber = $innerDreamNumber;
        $this->nameeChart = $nameChart;
    }

    /**
     * @return NameChart
     */
    public function getNameChart(): NameChart
    {
        return $this->nameeChart;
    }

    /**
     * @return InnerDreamNumber
     */
    public function getInnerDreamNumber(): InnerDreamNumber
    {
        return $this->innerDreamNumber;
    }
}
