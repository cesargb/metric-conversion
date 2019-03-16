<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\TimeUnits;
use Cesargb\Metric\Traits\MetricOneTrait;

class Time
{
    use MetricOneTrait;

    public function setUnit(TimeUnits $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function convertTo(TimeUnits $unitDestination): float
    {
        $ratioConversion = $unitDestination->value() / $this->unit->value();

        return $this->convert($ratioConversion);
    }
}
