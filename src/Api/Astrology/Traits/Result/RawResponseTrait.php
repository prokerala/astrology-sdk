<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Traits\Result;

trait RawResponseTrait
{
    /**
     * @var null|\stdClass
     */
    private $apiResponse;

    public function setRawResponse(\stdClass $data)
    {
        $this->apiResponse = $data;
    }

    /**
     * @return null|\stdClass
     */
    public function getRawResponse()
    {
        return $this->apiResponse;
    }
}
