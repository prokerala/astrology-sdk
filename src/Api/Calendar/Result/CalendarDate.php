<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Calendar\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class CalendarDate implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var CalendarDateResult
     */
    private $calendarDate;

    public function __construct(CalendarDateResult $calendarDate)
    {
        $this->calendarDate = $calendarDate;
    }

    public function getDishaShool(): CalendarDateResult
    {
        return $this->calendarDate;
    }
}
