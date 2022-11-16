<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result;

interface ResultInterface
{
    /**
     * @internal
     */
    public function setRawResponse(\stdClass $data): void;

    /**
     * Get the raw response returned by the API server.
     */
    public function getRawResponse(): ?\stdClass;
}
