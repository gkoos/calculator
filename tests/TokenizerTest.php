<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Arqiva\Calculator\Calculator;
use Arqiva\Calculator\Tokenizer;

final class TokenizerTest extends TestCase
{
    protected $calculator;

    public function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testMalformedLineThrowsException(): void
    {
        $this->expectException(\Exception::class);

        Tokenizer::getCommand("add! 3", $this->calculator);
    }

    public function testWellformedLineReturnsCommand(): void
    {
        $command = Tokenizer::getCommand("add 3", $this->calculator);
        $this->assertInstanceOf(\Arqiva\Calculator\Operation\AdditionOperation::class, $command);
    }

    public function testIgnoresWhitespaces(): void
    {
        $command = Tokenizer::getCommand("add  \t3  ", $this->calculator);
        $this->assertInstanceOf(\Arqiva\Calculator\Operation\AdditionOperation::class, $command);
    }
}
