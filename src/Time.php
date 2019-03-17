<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\TimeUnits;
use Cesargb\Metric\Traits\MetricOneTrait;

class Time
{
    use MetricOneTrait;

    public function __construct()
    {
        $this->unitClassType = TimeUnits::class;
    }
}
