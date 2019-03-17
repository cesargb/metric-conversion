<?php

namespace Cesargb\Metric\Traits;

use BadMethodCallException;


trait MetricOneTrait
{
    use MetricTrait;

    private $unitsClassType;

    private $unitSource;

    protected function callConvert($unit, $arguments)
    {
        $value = $arguments[0] ?? null;

        if (is_numeric($value)) {
            $this->value = $value;

            $this->unitSource = call_user_func($this->unitsClassType.'::'.strtolower($unit))->value();

            return $this;
        } else {
            throw new InvalidArgumentException('Argument does not valid.');
        }
    }

    protected function callTo($unit)
    {
        $unitTo = call_user_func($this->unitsClassType.'::'.strtolower($unit))->value();

        $ratioConversion = $unitTo / $this->unitSource;

        $value = $this->value * $ratioConversion;

        return round($value, $this->precision, $this->roundMode);
    }
}
