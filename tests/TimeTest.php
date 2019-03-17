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
    public function testTime($valueSource, $unitSource, $unitToConvert, $valueExpected, $precision = 2)
    {
        $conver = 'convert'.$unitSource;

        $to = 'to'.$unitToConvert;

        $result = call_user_func(Time::class.'::'.$conver, $valueSource)->$to();

        $this->assertEquals($valueExpected, $result);
    }

    public function dataProvider()
    {
        return [
            [1209, 'Seconds', 'Minutes', 72540],
        ];
    }
}
