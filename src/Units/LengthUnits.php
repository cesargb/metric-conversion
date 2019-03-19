<?php

namespace Cesargb\Metric\Units;

use Eloquent\Enumeration\AbstractEnumeration;

class LengthUnits extends AbstractEnumeration
{
    const millimeters = 1000000;
    const centimeters = 100000;
    const decimeters = 10000;
    const meters = 1000;
    const kilometers = 1;

    const inches = 39370.0787401575;
    const feet = 3280.83989501312;
    const yards = 1093.613298337718;
    const miles = 0.6213711922373339;
}
