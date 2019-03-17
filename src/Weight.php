<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\WeigthUnits;
use Cesargb\Metric\Traits\MetricOneTrait;

class Weight
{
    use MetricOneTrait;

    public function __construct()
    {
        $this->unitsClassType = WeigthUnits::class;
    }
}
