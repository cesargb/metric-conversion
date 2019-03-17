<?php

namespace Cesargb\Metric\Traits;

use PHPUnit\Framework\MockObject\BadMethodCallException;


trait MetricTrait
{
    private $value = 0;

    private $precision = 2;

    private $roundMode = PHP_ROUND_HALF_UP;

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function setPrecision(int $precision): self
    {
        $this->precision = $precision;

        return $this;
    }

    public function setRound(int $mode): self
    {
        $this->roundMode = $mode;

        return $this;
    }

    public function __call($method, $arguments)
    {
        if ($this->isMethodTypeConvert($method)) {
           return $this->callConvert(substr($method, 7), $arguments);
        }

        if ($this->isMethodTypeTo($method)) {
            return $this->callTo(substr($method, 2));
         }

        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
    }

    public static function __callStatic($method, $arguments)
    {
        return (new self)->__call($method, $arguments);
    }

    protected function isArgumentsValid($arguments)
    {
        return is_numeric($arguments[0] ?? null);
    }

    protected function isMethodTypeConvert($method)
    {
        return substr($method, 0, 7) == 'convert';
    }

    protected function isMethodTypeTo($method)
    {
        return substr($method, 0, 2) == 'to';
    }
}
