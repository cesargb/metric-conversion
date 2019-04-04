<?php

namespace Cesargb\Metric\Traits;

use Exception;
use BadMethodCallException;
use InvalidArgumentException;
use Cesargb\Metric\Metric;

trait MetricTwoTrait
{
    use MetricTrait;

    private $unitsClassType;

    private $itemSourceOne;

    private $itemSourceTwo;

    private $itemToOne;

    private $itemToTwo;

    protected function callConvert($units, $arguments)
    {
        if ($this->isArgumentsValid($arguments)) {
            $this->setValue($arguments[0]);

            $unitsPart = $this->getUnits($units);

            if (count($unitsPart) == 2) {
                $this->setSourceUnits($unitsPart);

                if ($this->isInvalidSource()) {
                    throw new Exception("Error, previus convert was bad formatted.",);
                }

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
        list(
            $unitsSourceMemberOne,
            $unitsSourceMemberTwo
        ) = $units;

        $this->itemSourceOne = new Metric($this->unitsClassType, $unitsSourceMemberOne);

        $this->itemSourceTwo = new Metric($this->unitsClassType, $unitsSourceMemberTwo);
    }

    protected function callTo($units)
    {
        if ($this->isInvalidSource()) {
            throw new Exception("Error, previus convert is required.");
        }

        $unitsArr = $this->getUnits($units);

        if (count($unitsArr) == 2) {
            $this->setToUnits($unitsArr);

            if ($this->isInvalidTo()) {
                throw new Exception("Error, method to bad formatted.");
            }

            if ($this->itemSourceOne->getClass() == $this->itemToOne->getClass()) {
                return round(
                    $this->value * $this->getRatioConversion(),
                    $this->precision,
                    $this->roundMode
                );
            } else {
                return round(
                    $this->getRatioConversion() / $this->value,
                    $this->precision,
                    $this->roundMode
                );
            }
        } else {
            throw new BadMethodCallException(sprintf(
                'Method %s::%s does not exist.',
                static::class,
                'to'.$units
            ));
        }
    }

    protected function setToUnits(array $units)
    {
        list(
            $unitsToMemberOne,
            $unitsToMemberTwo
        ) = $units;

        $this->itemToOne = new Metric($this->unitsClassType, $unitsToMemberOne);

        $this->itemToTwo = new Metric($this->unitsClassType, $unitsToMemberTwo);
    }

    protected function isInvalidSource(): bool
    {
        return is_null($this->itemSourceOne)
                    || is_null($this->itemSourceTwo)
                    || is_null($this->itemSourceOne->getValue())
                    || is_null($this->itemSourceTwo->getValue())
                    || is_null($this->itemSourceOne->getClass())
                    || is_null($this->itemSourceTwo->getClass())
                    || $this->itemSourceOne->getClass() == $this->itemSourceTwo->getClass();
    }

    protected function isInvalidTo(): bool
    {
        return is_null($this->itemToOne)
                    || is_null($this->itemToTwo)
                    || is_null($this->itemToOne->getClass())
                    || is_null($this->itemToTwo->getClass())
                    || $this->itemToOne->getClass() == $this->itemToTwo->getClass();
    }

    protected function getUnits($value)
    {
        return preg_split('/(?=[A-Z])/', $value, -1, PREG_SPLIT_NO_EMPTY);
    }

    protected function getRatioConversion(): float
    {
        if ($this->itemSourceOne->getClass() == $this->itemToOne->getClass()) {
            return $this->getRatioConversionOne()
                    / $this->getRatioConversionTwo();
        } else {
            return $this->getRatioConversionOne()
                    / $this->getRatioConversionTwo();
        }
    }

    protected function getRatioConversionOne(): float
    {
        if ($this->itemSourceOne->getClass() == $this->itemToOne->getClass()) {
            return $this->itemToOne->getValue() / $this->itemSourceOne->getValue();
        } else {
            return $this->itemToOne->getValue() / $this->itemSourceTwo->getValue();
        }
    }

    protected function getRatioConversionTwo(): float
    {
        if ($this->itemSourceOne->getClass() == $this->itemToOne->getClass()) {
            return $this->itemToTwo->getValue() / $this->itemSourceTwo->getValue();
        } else {
            return $this->itemToTwo->getValue() / $this->itemSourceOne->getValue();
        }

    }
}