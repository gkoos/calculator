<?php

namespace Arqiva\Calculator\Operation;

class DivisionOperator extends AbstractOperation
{
    public function execute()
    {
        $operand1 = $this->calculator->getValue();
        $operand2 = $this->operand;

        if ($operand2 === 0.0) {
            throw new \Exception("division by zero");
        }

        $this->calculator->setValue($operand1 / $operand2);
    }
}