<?php

namespace Cesargb\Metric;

use Eloquent\Enumeration\AbstractEnumeration;

interface MetricInterface
{
    public function setUnit(AbstractEnumeration $unit): self;

    public function convertTo(AbstractEnumeration $unitDestination): float;
}
