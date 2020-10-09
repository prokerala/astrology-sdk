<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Yoga;

class YogaDetails
{
    /**
     * @var string
     */
    private $majorYogas;
    /**
     * @var string
     */
    private $chandraYogas;
    /**
     * @var string
     */
    private $sooryaYogas;
    /**
     * @var string
     */
    private $inauspiciousYogas;

    /**
     * YogaList constructor.
     *
     * @param string $majorYogas
     * @param string $chandraYogas
     * @param string $sooryaYogas
     * @param string $inauspiciousYogas
     */
    public function __construct(
        $majorYogas,
        $chandraYogas,
        $sooryaYogas,
        $inauspiciousYogas
    ) {
        $this->majorYogas = $majorYogas;
        $this->chandraYogas = $chandraYogas;
        $this->sooryaYogas = $sooryaYogas;
        $this->inauspiciousYogas = $inauspiciousYogas;
    }

    /**
     * @return string
     */
    public function getMajorYogas()
    {
        return $this->majorYogas;
    }

    /**
     * @return string
     */
    public function getChandraYogas()
    {
        return $this->chandraYogas;
    }

    /**
     * @return string
     */
    public function getSooryaYogas()
    {
        return $this->sooryaYogas;
    }

    /**
     * @return string
     */
    public function getInauspiciousYogas()
    {
        return $this->inauspiciousYogas;
    }
}
