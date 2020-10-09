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

use Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat;

class AuspiciousPeriod
{
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    private $abhijitMuhurat;
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[]
     */
    private $amritKaal;
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    private $brahmaMuhurat;

    /**
     * AuspiciousPeriod constructor.
     *
     * @param \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[] $amritKaal
     */
    public function __construct(Muhurat $abhijitMuhurat, array $amritKaal, Muhurat $brahmaMuhurat)
    {
        $this->abhijitMuhurat = $abhijitMuhurat;
        $this->amritKaal = $amritKaal;
        $this->brahmaMuhurat = $brahmaMuhurat;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    public function getAbhijitMuhurat()
    {
        return $this->abhijitMuhurat;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[]
     */
    public function getAmritKaal()
    {
        return $this->amritKaal;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    public function getBrahmaMuhurat()
    {
        return $this->brahmaMuhurat;
    }
}
