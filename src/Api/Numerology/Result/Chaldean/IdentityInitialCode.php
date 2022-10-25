<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Chaldean\DailyNameNumber;


class IdentityInitialCode implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var IdentityInitialCode
     */
    private $identityInitialCode;


    /**
     * @param IdentityInitialCode $identityInitialCode
     */
    public function __construct(IdentityInitialCode $identityInitialCode) {
        $this->identityInitialCode = $identityInitialCode;
    }

    /**
     * @return IdentityInitialCode
     */
    public function getDailyNameNumber(): IdentityInitialCode
    {
        return $this->identityInitialCode;
    }


}
