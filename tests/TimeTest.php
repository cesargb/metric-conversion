<?php

namespace Cesargb\Metric\Test;

use Cesargb\Metric\Time;
use PHPUnit\Framework\TestCase;
use Cesargb\Metric\Tests\Traits\Metric;

class TimeTest extends TestCase
{
    use Metric;

    public function setup(): void
    {
        $this->metricClass = Time::class;

        parent::setup();
    }

    public function dataProvider()
    {
        return [
            [120.9 * 60, 'Seconds', 'Minutes', 120.9],
            [1209.2 * 3600, 'Seconds', 'Hours', 1209.2],
            [12.2 * 86400, 'Seconds', 'Days', 12.2],
        ];
    }
}
