<?php

namespace Cesargb\Metric\Tests;

use PHPUnit\Framework\TestCase;
use Cesargb\Metric\Tests\Traits\Metric;
use Cesargb\Metric\Length;

class LengthTest extends TestCase
{
    use Metric;

    public function setup(): void
    {
        $this->metricClass = Length::class;

        parent::setup();
    }

    public function dataProvider()
    {
        return [
            [0, 'Meters', 'Kilometers', 0],
            [1020, 'Meters', 'Kilometers', 1.02],
            [10, 'Miles', 'Meters', 16093.44],
            [1496.68992, 'Meters', 'Miles', 0.93],
            [10, 'Miles', 'Yards', 17600],
        ];
    }
}
