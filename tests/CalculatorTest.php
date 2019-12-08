<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Arqiva\Calculator\Calculator;

final class CalculatorTest extends TestCase
{
    public function testCannotUseUninitializedCalculator(): void
    {
        $this->expectException(\Exception::class);

        $calculator = new Calculator();
        $calculator->setValue(15);
    }

    public function testCannotInitializeTwice(): void
    {
        $this->expectException(\Exception::class);

        $calculator = new Calculator();
        $calculator->initialize(20);
        $calculator->initialize(10);
    }

    public function testInitializeAndSetValue(): void
    {
        $calculator = new Calculator();
        $calculator->initialize(20);
        $calculator->setValue(15);
        $this->assertEquals($calculator->getValue(), 15.0);
    }
}
