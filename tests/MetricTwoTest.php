<?php

namespace Cesargb\Metric\Test;

use Exception;
use Cesargb\Metric\Speed;
use BadMethodCallException;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Eloquent\Enumeration\Exception\UndefinedMemberException;

class MetricTwoTest extends TestCase
{
    public function testInvalidArgument()
    {
        $this->expectException(InvalidArgumentException::class);

        Speed::convertMetersHours(null);
    }

    public function testMethodDontExists()
    {
        $this->expectException(BadMethodCallException::class);

        Speed::badMethod();
    }

    public function testBadMethodConvert()
    {
        $this->expectException(BadMethodCallException::class);

        Speed::convertBad(10);
    }

    public function testBadMethodConvertOne()
    {
        $this->expectException(Exception::class);

        Speed::convertBadHours(10);
    }

    public function testBadMethodConvertTwo()
    {
        $this->expectException(Exception::class);

        Speed::convertMetersBad(10);
    }

    public function testToWithoutConvert()
    {
        $this->expectException(Exception::class);

        Speed::toBadHours();
    }

    public function testBadMethodTo()
    {
        $this->expectException(BadMethodCallException::class);

        Speed::convertMetersSeconds(1)->toBad();
    }

    public function testBadMethodToOne()
    {
        $this->expectException(Exception::class);

        Speed::convertMetersSeconds(1)->toBadHours();
    }

    public function testBadMethodToTwo()
    {
        $this->expectException(Exception::class);

        Speed::convertMetersSeconds(1)->toMetersBad();
    }
}
