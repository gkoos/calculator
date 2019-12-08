<?php

namespace Arqiva\Calculator\Operation;

class PowerOperation extends AbstractOperation
{
    public function execute()
    {
        $operand1 = $this->calculator->getValue();
        $operand2 = $this->operand;

        $value = pow($operand1, $operand2);

        if (!is_finite($value)) {
            throw new \Exception("power: overflow error");
        }

        $this->calculator->setValue($value);
    }
}