<?php

declare(strict_types=1);

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

class Message
{
    /** @var string */
    private $type;
    /** @var string */
    private $description;

    /**
     * Message constructor.
     *
     * @param string $type
     * @param string $description
     */
    public function __construct($type, $description)
    {
        $this->type = $type;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
