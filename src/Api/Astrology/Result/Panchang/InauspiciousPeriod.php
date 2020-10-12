<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Panchang;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class InauspiciousPeriod implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var Muhurat\Muhurat[]
     */
    private $data;

    /**
     * InauspiciousPeriod constructor.
     *
     * @param Muhurat\Muhurat[] $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return Muhurat\Muhurat[]
     */
    public function getData()
    {
        return $this->data;
    }
}
