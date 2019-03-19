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

            $unitsPart = $this->splitAtUpperCase($units);

            if (count($unitsPart) == 2) {
                $this->unitOneSource = call_user_func(
                    $this->unitsOneClassType.'::'.strtolower($unitsPart[0])
                )->value();

                $this->unitTwoSource = call_user_func(
                    $this->unitsTwoClassType.'::'.strtolower($unitsPart[1])
                )->value();

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

    protected function callTo($units)
    {
        if ($this->isInvalidSource()) {
            throw new Exception("Error, previus convert is required.");
        }

        $unitsPart = $this->splitAtUpperCase($units);

        if (count($unitsPart) == 2) {
            $unitOneTo = call_user_func(
                $this->unitsOneClassType.'::'.strtolower($unitsPart[0])
            )->value();

            $ratioOneConversion = $unitOneTo / $this->unitOneSource;

            $unitTwoTo = call_user_func(
                $this->unitsTwoClassType.'::'.strtolower($unitsPart[1])
            )->value();

            $ratioTwoConversion = $unitTwoTo / $this->unitTwoSource;

            $value = $this->value * $ratioOneConversion * $ratioTwoConversion;

            return round($value, $this->precision, $this->roundMode);
        }

        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.',
            static::class,
            'to'.$units
        ));
    }

    protected function splitAtUpperCase($value)
    {
        return preg_split('/(?=[A-Z])/', $value, -1, PREG_SPLIT_NO_EMPTY);
    }

    protected function isInvalidSource(): bool
    {
        return is_null($this->unitOneSource) || is_null($this->unitTwoSource);
    }
}
