# Metric Convert

Calculators for metric conversions

## Install

Via Composer

``` bash
$ composer require cesargb/metric-conversio
```

## Usage

``` php
$length = new Cesargb\Metric\Length;

$result = $length->setLength(10)
                ->setUnit(Cesargb\Metric\Units\LengthUnits::metrers())
                ->setPrecision(2)
                ->convertTo(Cesargb\Metric\Units\LengthUnits::yards());
```

## Testing

``` bash
$ composer test
```
