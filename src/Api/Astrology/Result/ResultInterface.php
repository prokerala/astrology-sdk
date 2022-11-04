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
     *
     * @return void
     */
    public function setRawResponse(\stdClass $data);

    /**
     * Get the raw response returned by the API server.
     *
     * @return null|\stdClass
     */
    public function getRawResponse();
}
