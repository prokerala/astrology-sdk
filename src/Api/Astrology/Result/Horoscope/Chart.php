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

final class Chart implements ResultInterface
{
    use RawResponseTrait;

    /**
     * Chart constructor.
     *
     * @param string                                                      $chartType
     * @param string                                                      $chartName
     * @param string                                                      $chartShortName
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Chart\ChartRasi[] $chartRasi
     */
    public function __construct(private $chartType, private $chartName, private $chartShortName, private array $chartRasi)
    {
    }

    /**
     * @return string
     */
    public function getChartType()
    {
        return $this->chartType;
    }

    /**
     * @return string
     */
    public function getChartName()
    {
        return $this->chartName;
    }

    /**
     * @return string
     */
    public function getChartShortName()
    {
        return $this->chartShortName;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Chart\ChartRasi[]
     */
    public function getChartRasi()
    {
        return $this->chartRasi;
    }
}
