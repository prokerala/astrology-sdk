<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan;

class Message
{
    public $messageType;

    public $message;

    /**
     * Message constructor.
     *
     * @param string $messageType
     * @param string $message
     */
    public function __construct($messageType, $message)
    {
        $this->messageType = $messageType;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessageType()
    {
        return $this->messageType;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
