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
    public function testTime(
        $value,
        $unitLengthSource,
        $unitTimeSource,
        $unitLengthToConvert,
        $unitTimeToConvert,
        $valueExpected,
        $precision = 2
        ) {
        $result = (new Speed)->setValue($value)
                            ->setUnitLength($unitLengthSource)
                            ->setUnitTime($unitTimeSource)
                            ->setPrecision($precision)
                            ->convertTo($unitLengthToConvert, $unitTimeToConvert);

        $this->assertEquals($valueExpected, $result);
    }

    public function dataProvider()
    {
        return [
            [
                18,
                LengthUnits::meters(),
                TimeUnits::seconds(),
                LengthUnits::kilometers(),
                TimeUnits::hours(),
                64.8
            ],
            [
                64.8,
                LengthUnits::kilometers(),
                TimeUnits::hours(),
                LengthUnits::meters(),
                TimeUnits::seconds(),
                18
            ],
        ];
    }
}
