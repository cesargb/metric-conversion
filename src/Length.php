<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\LengthUnits;

class Length
{
    use MetricTrait;

    public function setLength(float $length): self
    {
        $this->value = $length;

        return $this;
    }

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
