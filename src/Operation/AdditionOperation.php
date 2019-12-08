<?php

namespace Arqiva\Calculator\Operation;

class AdditionOperation extends AbstractOperation
{
    public function execute()
    {
        $operand1 = $this->calculator->getValue();
        $operand2 = $this->operand;

        $value = $operand1 + $operand2;

        if (!is_finite($value)) {
            throw new \Exception("addition: overflow error");
        }

        $this->calculator->setValue($value);
    }
}