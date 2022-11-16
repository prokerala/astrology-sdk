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

    private string $chartType;

    private string $chartName;

    private string $chartShortName;

    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Chart\ChartRasi[]
     */
    private array $chartRasi;

    /**
     * Chart constructor.
     *
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Chart\ChartRasi[] $chartRasi
     */
    public function __construct(string $chartType, string $chartName, string $chartShortName, array $chartRasi)
    {
        $this->chartType = $chartType;
        $this->chartName = $chartName;
        $this->chartShortName = $chartShortName;
        $this->chartRasi = $chartRasi;
    }

    public function getChartType(): string
    {
        return $this->chartType;
    }

    public function getChartName(): string
    {
        return $this->chartName;
    }

    public function getChartShortName(): string
    {
        return $this->chartShortName;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Chart\ChartRasi[]
     */
    public function getChartRasi(): array
    {
        return $this->chartRasi;
    }
}
