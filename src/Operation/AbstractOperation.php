<?php

declare(strict_types=1);

namespace Arqiva\Calculator\Operation;

use Arqiva\Calculator\Calculator;

abstract class AbstractOperation
{
    protected $calculator;
    protected $operand;

    public function __construct(Calculator $calculator, float $operand)
    {
        $this->calculator = $calculator;
        $this->operand = $operand;
    }

    abstract public function execute();
}