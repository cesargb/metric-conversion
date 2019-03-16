<?php

namespace Cesargb\Metric;

trait MetricTrait
{
    private $value = 0;

    private $unit;

    private $precision = 2;

    public function setPrecision(int $precision): self
    {
        $this->precision = $precision;

        return $this;
    }

    protected function convert(float $ratioConversion): float
    {
        return round($this->value * $ratioConversion, $this->precision);
    }
}