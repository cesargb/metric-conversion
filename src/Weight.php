<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\WeigthUnits;

class Weight
{
    use MetricTrait;

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
