<?php

namespace Cesargb\Metric\Traits;

use BadMethodCallException;


trait MetricOneTrait
{
    use MetricTrait;

    private $unitClassType;

    private $unitSource;

    protected function callConvert($unit, $arguments)
    {
        $value = $arguments[0] ?? null;

        if (is_numeric($value)) {
            $this->value = $value;

            $this->unitSource = call_user_func($this->unitClassType.'::'.strtolower($unit))->value();

            return $this;
        } else {
            throw new InvalidArgumentException('Argument does not valid.');
        }
    }

    protected function callTo($unit)
    {
        $unitTo = call_user_func($this->unitClassType.'::'.strtolower($unit))->value();

        $value = $this->value * $unitTo / $this->unitSource;

        return round($value, $this->precision, $this->roundMode);
    }
}
