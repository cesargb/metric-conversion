<?php

namespace Cesargb\Metric;

trait MetricTrait
{
    private $value = 0;

    private $unit;

    private $precision = 0;

    private $roundMode = PHP_ROUND_HALF_UP;

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function setPrecision(int $precision): self
    {
        $this->precision = $precision;

        return $this;
    }

    public function setRound(int $mode): self
    {
        $this->roundMode = $mode;

        return $this;
    }

    protected function convert(float $ratioConversion): float
    {
        $value = $this->value * $ratioConversion;

        return round($value, $this->precision, $this->roundMode);
    }
}