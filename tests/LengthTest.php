<?php

namespace Cesargb\Metric\Test;

use Cesargb\Metric\Length;
use PHPUnit\Framework\TestCase;
use Cesargb\Metric\Units\LengthUnits;
use Cesargb\Metric\Units\WeigthUnits;

class LengthTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testLength($value, $unitSource, $unitToConvert, $valueExpected, $precision = 2)
    {
        $result = (new Length)->setValue($value)
                            ->setUnit($unitSource)
                            ->setPrecision($precision)
                            ->convertTo($unitToConvert);

        $this->assertEquals($valueExpected, $result);
    }

    public function dataProvider()
    {
        return [
            [0, LengthUnits::meters(), LengthUnits::kilometers(), 0],
            [1020, LengthUnits::meters(), LengthUnits::kilometers(), 1.02],
            [15.2, LengthUnits::kilometers(), LengthUnits::meters(), 15200],
            [10, LengthUnits::miles(), LengthUnits::meters(), 16093.44],
            [1500, LengthUnits::meters(), LengthUnits::miles(), 0.93],
            [10.2, LengthUnits::miles(), LengthUnits::kilometers(), 16.42],
            [10, LengthUnits::miles(), LengthUnits::yards(), 17600],
            [10000, LengthUnits::yards(), LengthUnits::miles(), 5.68],
        ];
    }
}
