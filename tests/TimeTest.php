<?php

namespace Cesargb\Metric\Test;

use Cesargb\Metric\Time;
use PHPUnit\Framework\TestCase;
use Cesargb\Metric\Units\TimeUnits;

class TimeTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testTime($value, $unitSource, $unitToConvert, $valueExpected, $precision = 2)
    {
        $result = (new Time)->setValue($value)
                            ->setUnit($unitSource)
                            ->setPrecision($precision)
                            ->convertTo($unitToConvert);

        $this->assertEquals($valueExpected, $result);
    }

    public function dataProvider()
    {
        return [
            [1209, TimeUnits::seconds(), TimeUnits::minutes(), 72540],
        ];
    }
}
