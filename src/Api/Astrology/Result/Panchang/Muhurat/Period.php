<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Panchang\Muhurat;

class Period
{
    /**
     * @var \DateTimeInterface
     */
    private $start;
    /**
     * @var \DateTimeInterface
     */
    private $end;

    public function __construct(\DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStart()
    {
        return  $this->start;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEnd()
    {
        return $this->end;
    }
}
