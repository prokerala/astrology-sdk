<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Traits\Service;

use Prokerala\Api\Astrology\Transformer;

/**
 * @internal
 * @template T
 */
trait TimeZoneAwareTrait
{
    /** @var null|\DateTimeZone */
    private $tz;

    /**
     * @param null|\DateTimeZone $tz
     *
     * @return void
     */
    public function setTimeZone($tz)
    {
        $this->tz = $tz;
    }

    /**
     * @return \DateTimeZone
     */
    public function getTimeZone()
    {
        if (!isset($this->tz)) {
            $this->tz = new \DateTimeZone(date_default_timezone_get());
        }

        return $this->tz;
    }

    /**
     * @param Transformer<T> $transformer
     *
     * @return void
     */
    private function addDateTimeTransformer($transformer)
    {
        $transformer->setParamConverter('string', \DateTimeInterface::class, function ($data) {
            return (new \DateTimeImmutable($data))->setTimezone($this->getTimeZone());
        });
    }
}
