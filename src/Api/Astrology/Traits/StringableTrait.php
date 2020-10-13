<?php

namespace Prokerala\Api\Astrology\Traits;

trait StringableTrait
{
    public function __toString()
    {
        return $this->name;
    }
}
