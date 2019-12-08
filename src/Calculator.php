<?php

declare(strict_types=1);

namespace Arqiva\Calculator;

class Calculator
{
    const UNINITIALIZED = 0;
    const INITIALIZED = 1;

    protected $state = self::UNINITIALIZED;

    protected $value = 0.0;

    public function initialize(float $value)
    {
        if ($this->state === self::INITIALIZED) {
            throw new \Exception("calculator already initialized");
        }

        $this->state = self::INITIALIZED;
        $this->value = $value;
    }

    public function setValue(float $newValue)
    {
        if ($this->state !== self::INITIALIZED) {
            throw new \Exception("calculator is not initialized");
        }

        $this->value = $newValue;
    }

    public function getValue()
    {
        return $this->value;
    }
}