<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Chaldean\WholeNameNumber;

class WholeName implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var WholeNameNumber
     */
    private $wholeNameNumber;


    /**
     * @param WholeNameNumber $wholeNameNumber
     */
    public function __construct(WholeNameNumber $wholeNameNumber) {
        $this->wholeNameNumber = $wholeNameNumber;
    }

    /**
     * @return WholeNameNumber
     */
    public function getWholeNameNumber(): WholeNameNumber
    {
        return $this->wholeNameNumber;
    }


}
