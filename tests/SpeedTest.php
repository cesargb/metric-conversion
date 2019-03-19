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
            [1, 'MetersSeconds', 'KilometersHours', 3.6],
            [1, 'KilometersHours', 'MilesHours', 0.6214],
            [1, 'KilometersHours', 'FeetSeconds', 0.9113],
        ];
    }
}
