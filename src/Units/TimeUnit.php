<?php

namespace Cesargb\Metric\Units;

use Eloquent\Enumeration\AbstractEnumeration;

class TimeUnits extends AbstractEnumeration
{
    const seconds = 1;
    const minutes = 60;
    const hours = 3600;
    const day = 86400;
}