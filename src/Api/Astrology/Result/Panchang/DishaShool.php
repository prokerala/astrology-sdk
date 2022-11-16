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

final class DishaShool implements ResultInterface
{
    use RawResponseTrait;

    private DishaShoolResult $dishaShool;

    public function __construct(DishaShoolResult $dishaShool)
    {
        $this->dishaShool = $dishaShool;
    }

    public function getDishaShool(): DishaShoolResult
    {
        return $this->dishaShool;
    }
}
