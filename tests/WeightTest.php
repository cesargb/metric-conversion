<?php

namespace Cesargb\Metric\Test;

use Cesargb\Metric\Weight;
use PHPUnit\Framework\TestCase;
use Cesargb\Metric\Tests\Traits\Metric;


class WeightTest extends TestCase
{
    use Metric;

    public function setup(): void
    {
        $this->metricClass = Weight::class;

        parent::setup();
    }

    public function dataProvider()
    {
        return [
            [1210, 'Grams', 'Kilograms', 1.21],
        ];
    }
}
