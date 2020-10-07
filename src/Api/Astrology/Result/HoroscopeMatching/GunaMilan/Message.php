<?php

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan;

class Message
{
    public $messageType;

    public $message;

    /**
     * Message constructor.
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
