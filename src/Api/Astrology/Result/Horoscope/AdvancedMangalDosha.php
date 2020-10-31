<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class AdvancedMangalDosha implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var bool
     */
    private $hasDosha;
    /**
     * @var string
     */
    private $description;
    /**
     * @var bool
     */
    private $hasException;
    /**
     * @var null|string
     */
    private $type;
    /**
     * @var string[]
     */
    private $exceptions;
    /**
     * @var string[]
     */
    private $remedies;

    /**
     * AdvancedMangalDosha constructor.
     *
     * @param bool        $hasDosha
     * @param string      $description
     * @param bool        $hasException
     * @param null|string $type
     * @param string[]    $exceptions
     * @param string[]    $remedies
     */
    public function __construct(
        $hasDosha,
        $description,
        $hasException,
        $type,
        array $exceptions,
        array $remedies
    ) {
        $this->hasDosha = $hasDosha;
        $this->description = $description;
        $this->hasException = $hasException;
        $this->type = $type;
        $this->exceptions = $exceptions;
        $this->remedies = $remedies;
    }

    /**
     * @return bool
     */
    public function hasDosha()
    {
        return $this->hasDosha;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function hasException()
    {
        return $this->hasException;
    }

    /**
     * @return null|string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string[]
     */
    public function getExceptions()
    {
        return $this->exceptions;
    }

    /**
     * @return string[]
     */
    public function getRemedies()
    {
        return $this->remedies;
    }
}
