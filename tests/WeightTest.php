<?php

namespace Cesargb\Metric\Test;

use Cesargb\Metric\Weight;
use PHPUnit\Framework\TestCase;
use Cesargb\Metric\Units\WeigthUnits;

class WeightTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testWeight($valueSource, $unitSource, $unitToConvert, $valueExpected, $precision = 2)
    {
        $conver = 'convert'.$unitSource;

        $to = 'to'.$unitToConvert;

        $result = call_user_func(Weight::class.'::'.$conver, $valueSource)->$to();

        $this->assertEquals($valueExpected, $result);
    }

    public function dataProvider()
    {
        return [
            [1209, 'Grams', 'Kilograms', 1.21],
            [1.044, 'Kilograms', 'Grams', 1044],
        ];
    }
}
