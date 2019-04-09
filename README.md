# Metric Conversion

Library to metric conversions.

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

$yards = Length::convertMeters(10)
                    ->toYards(); // $yards = 10.94

$yards = Length::convertMeters(10)
                    ->setPrecision(4)
                    ->toYards(); // $yards = 10.9361

$kilograms = Weight::convertGrams(2305)
                    ->toKilograms(); // $kilograms = 2.31

$kilograms = Weight::convertGrams(2305)
                    ->setPrecision(4)
                    ->toKilograms(); // $kilograms = 2.305

$kilograms = Weight::convertGrams(2309)
                    ->setRound(PHP_ROUND_HALF_EVEN)
                    ->toKilograms(); // $kilograms = 2.30

$yardsMinutes = Speed::convertKilometersHours(100)
                    ->toYardsMinutes(); // $yardsMinutes = 1822.69

$pacePerKilometer = Speed::converKilometersHours(15)
                    ->toMinutesKilomenters(); // $pacePerKilometer = 4
```

## Testing

``` bash
$ composer test
```
