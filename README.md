# Metric Convert

Calculators for metric conversions

## Install

Via Composer

``` bash
$ composer require cesargb/metric-conversion
```

## Usage

``` php
use Cesargb\Metric\Length;
use Cesargb\Metric\Weight;
use Cesargb\Metric\Units\LengthUnits;
use Cesargb\Metric\Units\WeightUnits;

// ...

$length = new Length;

$result = $length->setValue(10)
                ->convertTo(LengthUnits::yards());

// More details

$result = $length->setValue(10)
                ->setUnit(LengthUnits::metrers())
                ->setPrecision(0)
                ->setRound(PHP_ROUND_HALF_UP)
                ->convertTo(LengthUnits::yards());

$weight = new Weight;

$result = $weight->setValue(10)
                ->convertTo(WeightUnits::kilograms());
```

## Testing

``` bash
$ composer test
```
