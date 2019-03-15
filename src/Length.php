<?php

namespace Cesargb\Metric;

use Cesargb\Metric\Units\LengthUnits;

class Length
{
    private $length = 0;

    private $unit;

    public function __construct(float $unit = null, int $precision = 2)
    {
        $this->unit = $unit ?? LengthUnits::meters;

        $this->precision = $precision;
    }

    public function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function setUnit(float $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getPrecision()
    {
        return $this->precision;
    }

    public function setPrecision(int $precision): self
    {
        $this->precision = $precision;

        return $this;
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function convertToMeters(): float
    {
        return $this->convertTo(LengthUnits::meters);
    }

    public function convertToKiloMeters(): float
    {
        return $this->convertTo(LengthUnits::kilometers);
    }

    public function convertToYards(): float
    {
        return $this->convertTo(LengthUnits::yards);
    }

    public function convertToMiles(): float
    {
        return $this->convertTo(LengthUnits::miles);
    }

    public function convertToKiloMiles(): float
    {
        return $this->convertTo(LengthUnits::kilometers);
    }

    public function convertTo(float $unitDestination): float
    {
        return round($this->length *  $unitDestination / $this->unit, $this->precision);
    }
}
