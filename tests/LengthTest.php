<?php

namespace Cesargb\Metric\Test;

use Cesargb\Metric\Length;
use PHPUnit\Framework\TestCase;
use Cesargb\Metric\Units\LengthUnits;
use Cesargb\Metric\Units\WeigthUnits;

class LengthTest extends TestCase
{
    /**
     * @dataProvider dateLengthProvider
     */
    public function testLength($length, $unitSource, $unitToConvert, $lengthExpected, $precision = 2)
    {
        $lengthClass = new Length;

        $result = $lengthClass->setLength($length)
                            ->setUnit($unitSource)
                            ->setPrecision($precision)
                            ->convertTo($unitToConvert);

        $this->assertEquals($lengthExpected, $result);
    }

    public function dateLengthProvider()
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
