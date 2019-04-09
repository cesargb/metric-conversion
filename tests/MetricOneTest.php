<?php

namespace Cesargb\Metric\Test;

use Exception;
use Cesargb\Metric\Length;
use BadMethodCallException;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Eloquent\Enumeration\Exception\UndefinedMemberException;

class MetricOneTest extends TestCase
{
    public function testInvalidArgument()
    {
        $this->expectException(InvalidArgumentException::class);

        Length::convertMeters(null);
    }

    public function testMethodDontExists()
    {
        $this->expectException(BadMethodCallException::class);

        Length::badMethod();
    }

    public function testBadMethodConvert()
    {
        $this->expectException(UndefinedMemberException::class);

        Length::convertBad(1);
    }

    public function testToWithoutConvert()
    {
        $this->expectException(Exception::class);

        Length::toMeters();
    }

    public function testToBadMethod()
    {
        $this->expectException(UndefinedMemberException::class);

        Length::convertMeters(1)->toBad();
    }
}
