# Metric Convert

Calculators for metric conversions

## Install

Via Composer

``` bash
$ composer require cesargb/metric-conversio
```

## Usage

``` php
use Cesargb\Metric\Length;
use Cesargb\Metric\Units\LengthUnits;

// ...

$length = new Length;

$result = $length->setLength(10)
                ->convertTo(LengthUnits::yards());

// More details

$result = $length->setLength(10)
                ->setUnit(LengthUnits::metrers())
                ->setPrecision(0)
                ->setRound(PHP_ROUND_HALF_UP)
                ->convertTo(LengthUnits::yards());
```

## Testing

``` bash
$ composer test
```
