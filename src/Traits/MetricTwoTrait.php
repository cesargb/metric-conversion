<?php

namespace Cesargb\Metric\Traits;

trait MetricTwoTrait
{
    use MetricTrait;

    private $unitOne;

    private $unitTwo;

    protected function convert(float $ratioOneConversion, float $ratioTwoConversion): float
    {
        $value = $this->value * $ratioOneConversion * $ratioTwoConversion;

        return round($value, $this->precision, $this->roundMode);
    }
}
