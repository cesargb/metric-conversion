<?php

namespace Cesargb\Metric\Traits;

trait MetricOneTrait
{
    use MetricTrait;

    private $unit;

    protected function convert(float $ratioConversion): float
    {
        $value = $this->value * $ratioConversion;

        return round($value, $this->precision, $this->roundMode);
    }
}
