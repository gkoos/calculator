<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Arqiva\Calculator\Calculator;
use Arqiva\Calculator\Operation\ModOperation;

final class ModOperationTest extends TestCase
{
    protected $calculator;

    public function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testFirstOperandMustBeInteger(): void
    {
        $this->expectException(\Exception::class);

        $this->calculator->initialize(12.3);
        $modOperation = new ModOperation($this->calculator, 2);
        $modOperation->execute();
    }

    public function testSecondOperandMustBeInteger(): void
    {
        $this->expectException(\Exception::class);

        $this->calculator->initialize(12);
        $modOperation = new ModOperation($this->calculator, 2.75);
        $modOperation->execute();
    }

    public function testCalculateModulus(): void
    {
        $this->calculator->initialize(20);
        $modOperation = new ModOperation($this->calculator, 8);
        $modOperation->execute();
        $this->assertEquals($this->calculator->getValue(), 4.0);
    }
}
