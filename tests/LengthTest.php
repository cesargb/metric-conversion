<?php

namespace Cesargb\Metric\Test;

use Cesargb\Metric\Length;
use PHPUnit\Framework\TestCase;
use Cesargb\Metric\Units\LengthUnits;
use Cesargb\Metric\Units\WeigthUnits;
use PHPUnit\Framework\MockObject\BadMethodCallException;

class LengthTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testLength($valueSource, $unitSource, $unitToConvert, $valueExpected, $precision = 2)
    {
        $conver = 'convert'.$unitSource;

        $to = 'to'.$unitToConvert;

        $result = call_user_func(Length::class.'::'.$conver, $valueSource)->$to();

        $this->assertEquals($valueExpected, $result);
    }

    public function dataProvider()
    {
        return [
            [0, 'Meters', 'Kilometers', 0],
            [1020, 'Meters', 'Kilometers', 1.02],
            [15.2, 'Kilometers', 'Meters', 15200],
            [10, 'Miles', 'Meters', 16093.44],
            [1500, 'Meters', 'Miles', 0.93],
            [10.2, 'Miles', 'Kilometers', 16.42],
            [10, 'Miles', 'Yards', 17600],
            [10000, 'Yards', 'Miles', 5.68],
        ];
    }
}
