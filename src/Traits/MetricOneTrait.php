<?php

namespace Cesargb\Metric\Traits;

use Exception;
use InvalidArgumentException;

trait MetricOneTrait
{
    use MetricTrait;

    private $unitClassType;

    private $unitSource;

    protected function callConvert($unit, $arguments)
    {
        if ($this->isArgumentsValid($arguments)) {
            $this->setValue($arguments[0]);

            $this->unitSource = call_user_func($this->unitClassType.'::'.strtolower($unit))->value();

            return $this;
        }
        throw new InvalidArgumentException('Argument does not valid.');
    }

    protected function callTo($unit)
    {
        if ($this->isInvalidSource()) {
            throw new Exception("Error, previus convert is required.");
        }

        return $this->getConversion($unit);
    }

    protected function isInvalidSource(): bool
    {
        return is_null($this->unitSource);
    }

    protected function getConversion($unitTo)
    {
        $unitTo = call_user_func($this->unitClassType.'::'.strtolower($unitTo))
                    ->value();

        $value = $this->value * $unitTo / $this->unitSource;

        return round($value, $this->precision, $this->roundMode);
    }
}
