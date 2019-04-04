<?php

namespace Cesargb\Metric\Traits;

use Exception;
use BadMethodCallException;
use InvalidArgumentException;
use Eloquent\Enumeration\Exception\UndefinedMemberException;

trait MetricTwoTrait
{
    use MetricTrait;

    private $unitsClassType;

    private $unitsSourceClassOne;

    private $unitsSourceMemberOne;

    private $unitsSourceValueOne;

    private $unitsSourceClassTwo;

    private $unitsSourceMemberTwo;

    private $unitsSourceValueTwo;

    private $unitsToClassOne;

    private $unitsToMemberOne;

    private $unitsToValueOne;

    private $unitsToClassTwo;

    private $unitsToMemberTwo;

    private $unitsToValueTwo;

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
            $this->unitsSourceMemberOne,
            $this->unitsSourceMemberTwo
        ) = $units;

        $this->unitsSourceClassOne = $this->getUnitClassByMember($this->unitsSourceMemberOne);

        $this->unitsSourceClassTwo = $this->getUnitClassByMember($this->unitsSourceMemberTwo);

        $this->unitsSourceValueOne = $this->getValueFromMember(
            $this->unitsSourceClassOne,
            $this->unitsSourceMemberOne
        );

        $this->unitsSourceValueTwo = $this->getValueFromMember(
            $this->unitsSourceClassTwo,
            $this->unitsSourceMemberTwo
        );
    }

    protected function getUnitClassByMember($member)
    {
        foreach($this->unitsClassType as $unitClassType) {
            try {
                call_user_func($unitClassType.'::'.strtolower($member).'');

                return $unitClassType;
            } catch (UndefinedMemberException $e) {}
        }

        return null;
    }

    protected function getValueFromMember($class, $member)
    {
        if (empty($class)) {
            return null;
        }

        return call_user_func(
            $class.'::'.strtolower($member)
        )->value();
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

            if ($this->unitsSourceClassOne == $this->unitsToClassOne) {
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
            $this->unitsToMemberOne,
            $this->unitsToMemberTwo
        ) = $units;

        $this->unitsToClassOne = $this->getUnitClassByMember(
            $this->unitsToMemberOne
        );

        $this->unitsToClassTwo = $this->getUnitClassByMember(
            $this->unitsToMemberTwo
        );


        $this->unitsToValueOne = $this->getValueFromMember(
            $this->unitsToClassOne,
            $this->unitsToMemberOne
        );

        $this->unitsToValueTwo = $this->getValueFromMember(
            $this->unitsToClassTwo,
            $this->unitsToMemberTwo
        );
    }

    protected function isInvalidSource(): bool
    {
        return is_null($this->unitsSourceValueOne)
                    || is_null($this->unitsSourceValueTwo)
                    || is_null($this->unitsSourceClassOne)
                    || is_null($this->unitsSourceClassTwo)
                    || $this->unitsSourceValueOne == $this->unitsSourceValueTwo;
    }

    protected function isInvalidTo(): bool
    {
        return is_null($this->unitsToClassOne)
                    || is_null($this->unitsToClassTwo)
                    || $this->unitsToClassOne == $this->unitsToClassTwo;
    }

    protected function getUnits($value)
    {
        return preg_split('/(?=[A-Z])/', $value, -1, PREG_SPLIT_NO_EMPTY);
    }

    protected function getRatioConversion(): float
    {
        if ($this->unitsSourceClassOne == $this->unitsToClassOne) {
            return $this->getRatioConversionOne()
                    / $this->getRatioConversionTwo();
        } else {
            return $this->getRatioConversionOne()
                    / $this->getRatioConversionTwo();
        }
    }

    protected function getRatioConversionOne(): float
    {
        if ($this->unitsSourceClassOne == $this->unitsToClassOne) {
            return $this->unitsToValueOne / $this->unitsSourceValueOne;
        } else {
            return $this->unitsToValueOne / $this->unitsSourceValueTwo;
        }
    }

    protected function getRatioConversionTwo(): float
    {
        if ($this->unitsSourceClassOne == $this->unitsToClassOne) {
            return $this->unitsToValueTwo / $this->unitsSourceValueTwo;
        } else {
            return $this->unitsToValueTwo / $this->unitsSourceValueOne;
        }

    }
}