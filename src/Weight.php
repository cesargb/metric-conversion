<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\WeigthUnits;
use Cesargb\Metric\Traits\MetricOneTrait;

class Weight
{
    use MetricOneTrait;

    public function setUnit(WeigthUnits $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function convertTo(WeigthUnits $unitDestination): float
    {
        $ratioConversion = $unitDestination->value() / $this->unit->value();

        return $this->convert($ratioConversion);
    }
}
