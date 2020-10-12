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

use Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat;

class InauspiciousPeriod
{

    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[]
     */
    private $data;

    /**
     * InauspiciousPeriod constructor.
     * @param \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[] $data
     */
    public function __construct(array $data)
    {

        $this->data = $data;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[]
     */
    public function getData()
    {
        return $this->data;
    }




}
