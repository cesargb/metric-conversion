<?php

namespace Cesargb\Metric\Tests\Traits;

use Cesargb\Metric\Length;

trait Metric
{
    protected $metricClass;
    /**
     * @dataProvider dataProvider
     */
    public function testDataProvider($valueSource, $unitSource, $unitToConvert, $valueExpected)
    {
        $conver = 'convert'.$unitSource;

        $to = 'to'.$unitToConvert;

        $result = call_user_func($this->metricClass.'::'.$conver, $valueSource)
                    ->setPrecision(4)
                    ->$to();

        $this->assertEquals($valueExpected, $result);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testDataProviderInverse($valueExpected, $unitToConvert, $unitSource, $valueSource)
    {
        $conver = 'convert'.$unitSource;

        $to = 'to'.$unitToConvert;

        $result = call_user_func($this->metricClass.'::'.$conver, $valueSource)
                    ->setPrecision(4)
                    ->$to();

        $this->assertEquals($valueExpected, $result);
    }
}
