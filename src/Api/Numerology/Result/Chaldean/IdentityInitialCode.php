<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class IdentityInitialCode implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var IdentityInitialCodeNumber
     */
    private $identityInitialCodeNumber;

    public function __construct(IdentityInitialCodeNumber $identityInitialCodeNumber)
    {
        $this->identityInitialCodeNumber = $identityInitialCodeNumber;
    }

    public function getIdentityInitialCodeNumber(): IdentityInitialCodeNumber
    {
        return $this->identityInitialCodeNumber;
    }
}
