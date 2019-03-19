<?php

namespace Cesargb\Metric\Test;

use Cesargb\Metric\Length;
use PHPUnit\Framework\TestCase;

class MetricTest extends TestCase
{
    public function testSetPrecision()
    {
        $result = Length::convertMeters(1234)->setPrecision(4)->toKilometers();

        $this->assertEquals(1.234, $result);
    }

    public function testSetRoundDown()
    {
        $result = Length::convertMeters(1500)
                            ->setPrecision(0)
                            ->setRound(PHP_ROUND_HALF_DOWN)
                            ->toKilometers();

        $this->assertEquals(1, $result);
    }

    public function testSetRoundUp()
    {
        $result = Length::convertMeters(1500)
                            ->setPrecision(0)
                            ->setRound(PHP_ROUND_HALF_UP)
                            ->toKilometers();

        $this->assertEquals(2, $result);
    }
}
