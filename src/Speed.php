<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\TimeUnits;
use Cesargb\Metric\Units\LengthUnits;
use Cesargb\Metric\Traits\MetricTwoTrait;

class Speed
{
    use MetricTwoTrait;

    public function __construct()
    {
        $this->unitsOneClassType = LengthUnits::class;

        $this->unitsTwoClassType = TimeUnits::class;
    }
}
