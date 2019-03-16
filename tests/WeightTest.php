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
    public function testWeight($value, $unitSource, $unitToConvert, $valueExpected, $precision = 2)
    {
        $result = (new Weight)->setValue($value)
                            ->setUnit($unitSource)
                            ->setPrecision($precision)
                            ->convertTo($unitToConvert);

        $this->assertEquals($valueExpected, $result);
    }

    public function dataProvider()
    {
        return [
            [1209, WeigthUnits::grams(), WeigthUnits::kilograms(), 1.21],
            [1.044, WeigthUnits::kilograms(), WeigthUnits::grams(), 1044],
        ];
    }
}
