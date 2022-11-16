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
    private ?\DateTimeZone $tz;

    public function setTimeZone(?\DateTimeZone $tz): void
    {
        $this->tz = $tz;
    }

    public function getTimeZone(): \DateTimeZone
    {
        if (!isset($this->tz)) {
            $this->tz = new \DateTimeZone(date_default_timezone_get());
        }

        return $this->tz;
    }

    /**
     * @param Transformer<T> $transformer
     */
    private function addDateTimeTransformer(Transformer $transformer): void
    {
        $transformer->setParamConverter('string', \DateTimeInterface::class, fn ($data) => (new \DateTimeImmutable($data))->setTimezone($this->getTimeZone()));
    }
}
