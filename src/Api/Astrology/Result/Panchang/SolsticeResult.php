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


final class SolsticeResult
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $vedicName;
    /**
     * @param int $id
     * @param string $name
     * @param string $vedicName
     */
    public function __construct(int $id, string $name, string $vedicName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->vedicName = $vedicName;

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getVedicName(): string
    {
        return $this->vedicName;
    }

}
