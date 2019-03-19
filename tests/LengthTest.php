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
            [1, 'Meters', 'Meters', 1],
            [1020, 'Meters', 'Kilometers', 1.02],
            [10, 'Miles', 'Meters', 16093.44],
            [1.1, 'Miles', 'Yards', 1.1 * 1760],
            [1.1, 'Miles', 'Feet', 1.1 * 5280],
            [1.1, 'Miles', 'Inches', 1.1 * 63360],
        ];
    }
}
