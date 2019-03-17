# Metric Convert

Calculators for metric conversions

## Install

Via Composer

``` bash
$ composer require cesargb/metric-conversion
```

## Usage

``` php
use Cesargb\Metric\Time;
use Cesargb\Metric\Speed;
use Cesargb\Metric\Length;

// ...

$length = new Length;

$yards = Length::convertMeters(10)
                    ->toYards(); // $yards = 10.94

$yards = Length::convertMeters(10)
                    ->setPrecision(4)
                    ->toYards(); // $yards = 10.9361

$kilograms = Weight::convertGrams(2309)
                    ->toKilograms(); // $kilograms = 2.31

$kilograms = Weight::convertGrams(2309)
                    ->setPrecision(4)
                    ->toKilograms(); // $kilograms = 2.309

$kilograms = Weight::convertGrams(2309)
                    setRound(PHP_ROUND_HALF_EVEN)
                    ->toKilograms(); // $kilograms = 2.30

$yardsMinures = Speed::convertKilometersHours(100)
                ->toYardsMinutes(); // $yardsMinures = 1822.69
```

## Testing

``` bash
$ composer test
```
