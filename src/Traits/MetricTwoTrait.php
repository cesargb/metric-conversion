<?php

namespace Cesargb\Metric\Traits;

use Exception;
use BadMethodCallException;
use InvalidArgumentException;

trait MetricTwoTrait
{
    use MetricTrait;

    private $unitsClassType;

    private $unitsOneClassType;

    private $unitOneSource;

    private $unitsTwoClassType;

    private $unitTwoSource;

    protected function callConvert($units, $arguments)
    {
        if ($this->isArgumentsValid($arguments)) {
            $this->setValue($arguments[0]);

            $unitsPart = $this->getUnits($units);

            if (count($unitsPart) == 2) {
                $this->setSourceUnits($unitsPart);

                return $this;
            }

            throw new BadMethodCallException(sprintf(
                'Method %s::%s does not exist.',
                static::class,
                'convert'.$units
            ));
        }
        throw new InvalidArgumentException('Argument does not valid.');
    }

    protected function setSourceUnits(array $units)
    {
        list($unitOne , $unitTwo) = $units;

        $this->unitOneSource = call_user_func(
            $this->unitsOneClassType.'::'.strtolower($unitOne)
        )->value();

        $this->unitTwoSource = call_user_func(
            $this->unitsTwoClassType.'::'.strtolower($unitTwo)
        )->value();
    }

    protected function callTo($units)
    {
        if ($this->isInvalidSource()) {
            throw new Exception("Error, previus convert is required.");
        }

        $unitsArr = $this->getUnits($units);

        if (count($unitsArr) == 2) {
            return round(
                $this->value * $this->getRatioConversion($unitsArr),
                $this->precision,
                $this->roundMode
            );
        } else {
            throw new BadMethodCallException(sprintf(
                'Method %s::%s does not exist.',
                static::class,
                'to'.$units
            ));
        }
    }

    protected function isInvalidSource(): bool
    {
        return is_null($this->unitOneSource) || is_null($this->unitTwoSource);
    }

    protected function getUnits($value)
    {
        return preg_split('/(?=[A-Z])/', $value, -1, PREG_SPLIT_NO_EMPTY);
    }

    protected function getRatioConversion(array $units): float
    {
        list($unitOne , $unitTwo) = $units;

        return $this->getRatioConversionOne($unitOne)
                    * $this->getRatioConversionTwo($unitTwo);
    }

    protected function getRatioConversionOne($unitTo): float
    {
        $value = call_user_func(
            $this->unitsOneClassType.'::'.strtolower($unitTo)
        )->value();

        return $value / $this->unitOneSource;
    }

    protected function getRatioConversionTwo($unitTo): float
    {
        $value = call_user_func(
            $this->unitsTwoClassType.'::'.strtolower($unitTo)
        )->value();

        return $value / $this->unitTwoSource;
    }
}
