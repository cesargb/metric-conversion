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
            [1209, 'Seconds', 'Minutes', 72540],
        ];
    }
}
