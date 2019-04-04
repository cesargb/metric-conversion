<?php

namespace Cesargb\Metric;

use Eloquent\Enumeration\Exception\UndefinedMemberException;

class Metric
{
    private $unitsClassType;

    private $member;

    private $class = false;

    private $value = false;

    public function __construct($unitsClassType, $member)
    {
        $this->unitsClassType = $unitsClassType;

        $this->member = $member;
    }


    public function getClass()
    {
        if ($this->class === false) {
            foreach ($this->unitsClassType as $unitClassType) {
                try {
                    call_user_func($unitClassType.'::'.strtolower($this->member).'');

                    $this->class = $unitClassType;

                    return $this->class;
                } catch (UndefinedMemberException $e) {
                }
            }

            $this->class = null;
        }

        return $this->class;
    }

    public function getValue()
    {
        if ($this->value === false) {
            $class = $this->getClass();

            if (is_null($class)) {
                return null;
            }

            $this->value = call_user_func(
                $class.'::'.strtolower($this->member)
            )->value();
        }

        return $this->value;
    }
}
