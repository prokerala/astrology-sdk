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

class Chart
{
    /**
     * @var string
     */
    private $chartType;
    /**
     * @var string
     */
    private $chartName;
    /**
     * @var string
     */
    private $chartShortName;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Chart\ChartRasi[]
     */
    private $chartRasi;

    /**
     * Chart constructor.
     *
     * @param string                                                      $chartType
     * @param string                                                      $chartName
     * @param string                                                      $chartShortName
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Chart\ChartRasi[] $chartRasi
     */
    public function __construct($chartType, $chartName, $chartShortName, array $chartRasi)
    {
        $this->chartType = $chartType;
        $this->chartName = $chartName;
        $this->chartShortName = $chartShortName;
        $this->chartRasi = $chartRasi;
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
