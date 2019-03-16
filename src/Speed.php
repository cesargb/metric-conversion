<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\TimeUnits;
use Cesargb\Metric\Units\LengthUnits;
use Cesargb\Metric\Traits\MetricTwoTrait;

class Speed
{
    use MetricTwoTrait;

    public function setUnitLength(LengthUnits $unit): self
    {
        $this->unitOne = $unit;

        return $this;
    }

    public function setUnitTime(TimeUnits $unit): self
    {
        $this->unitTwo = $unit;

        return $this;
    }

    public function convertTo(LengthUnits $lengthUnitDestination, TimeUnits $timeUnitDestination): float
    {
        $ratioOneConversion = $lengthUnitDestination->value() / $this->unitOne->value();

        $ratioTwoConversion = $timeUnitDestination->value() / $this->unitTwo->value();

        return $this->convert($ratioOneConversion, $ratioTwoConversion);
    }
}
