<?php

namespace Cesargb\Metric\Test;

use Cesargb\Metric\Speed;
use PHPUnit\Framework\TestCase;
use Cesargb\Metric\Tests\Traits\Metric;

class SpeedTest extends TestCase
{
    use Metric;

    public function setup(): void
    {
        $this->metricClass = Speed::class;

        parent::setup();
    }

    public function dataProvider()
    {
        return [
            [
                18,
                'MetersSeconds',
                'KilometersHours',
                64.8
            ],
            [
                64.8,
                'KilometersHours',
                'MetersSeconds',
                18
            ],
        ];
    }
}
