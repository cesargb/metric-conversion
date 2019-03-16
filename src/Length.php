<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\LengthUnits;
use Cesargb\Metric\Traits\MetricOneTrait;

class Length
{
    use MetricOneTrait;

    public function setUnit(LengthUnits $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function convertTo(LengthUnits $unitDestination): float
    {
        $ratioConversion = $unitDestination->value() / $this->unit->value();

        return $this->convert($ratioConversion);
    }
}
