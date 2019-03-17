<?php

namespace Cesargb\Metric\Test;

use Cesargb\Metric\Speed;
use PHPUnit\Framework\TestCase;
use Cesargb\Metric\Units\TimeUnits;
use Cesargb\Metric\Units\LengthUnits;

class SpeedTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testSpeed($valueSource, $unitSource, $unitToConvert, $valueExpected, $precision = 2)
    {
        $conver = 'convert'.$unitSource;

        $to = 'to'.$unitToConvert;

        $result = call_user_func(Speed::class.'::'.$conver, $valueSource)->$to();

        $this->assertEquals($valueExpected, $result);
    }

    public function dataProvider()
    {
        return [
            [
                18,
                'MetersSeconds',
                'KilometersHours',
                64.8
            ],
            [
                64.8,
                'KilometersHours',
                'MetersSeconds',
                18
            ],
        ];
    }
}
