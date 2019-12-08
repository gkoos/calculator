<?php

namespace Arqiva\Calculator\Operation;

class ModOperation extends AbstractOperation
{
    public function execute()
    {
        $operand1 = $this->calculator->getValue();
        $operand2 = $this->operand;

        if (!$this->isInteger($operand1) || !$this->isInteger($operand2)) {
            throw new \Exception("for mod both operands have to be integer ($operand1 and $operand2 are given)");
        }

        $this->calculator->setValue($operand1 % $operand2);
    }

    protected function isInteger(float $number)
    {
        return floor($number) == $number;
    }
}