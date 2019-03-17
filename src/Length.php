<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\LengthUnits;
use Cesargb\Metric\Traits\MetricOneTrait;

class Length
{
    use MetricOneTrait;

    public function __construct()
    {
        $this->unitsClassType = LengthUnits::class;
    }
}
