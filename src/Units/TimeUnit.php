<?php

namespace Cesargb\Metric\Units;

use Eloquent\Enumeration\AbstractEnumeration;

class TimeUnits extends AbstractEnumeration
{
    const seconds = 86400;
    const minutes = 1440;
    const hours = 24;
    const days = 1;
}
