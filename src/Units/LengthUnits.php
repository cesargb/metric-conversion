<?php

namespace Cesargb\Metric\Units;

use Eloquent\Enumeration\AbstractEnumeration;

class LengthUnits extends AbstractEnumeration
{
    const meters = 1;
    const kilometers = 0.001;
    const yards = 1.0936132983377078;
    const miles = 0.0006213711922373339;
}
