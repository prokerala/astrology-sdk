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

class Choghadiya implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var Choghadiya\Period[]
     */
    private $data;

    /**
     * Choghadiya constructor.
     *
     * @param Choghadiya\Period[] $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return Choghadiya\Period[]
     */
    public function getData()
    {
        return $this->data;
    }
}
