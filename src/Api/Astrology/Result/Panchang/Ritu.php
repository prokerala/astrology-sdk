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

final class Ritu implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var RituResult
     */
    private $vedicRitu;
    /**
     * @var RituResult
     */
    private $drikRitu;

    public function __construct(RituResult $vedicRitu, RituResult $drikRitu)
    {
        $this->vedicRitu = $vedicRitu;
        $this->drikRitu = $drikRitu;
    }

    /**
     * @return RituResult
     */
    public function getVedicRitu(): RituResult
    {
        return $this->vedicRitu;
    }

    /**
     * @return RituResult
     */
    public function getDrikRitu(): RituResult
    {
        return $this->drikRitu;
    }

}
