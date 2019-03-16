<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\TimeUnits;

class Time
{
    use MetricTrait;

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
