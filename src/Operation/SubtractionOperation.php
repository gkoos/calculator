<?php

namespace Arqiva\Calculator\Operation;

class SubtractionOperation extends AbstractOperation
{
    public function execute()
    {
        $operand1 = $this->calculator->getValue();
        $operand2 = $this->operand;

        $value = $operand1 - $operand2;

        if (!is_finite($value)) {
            throw new \Exception("subtraction: overflow error");
        }

        $this->calculator->setValue($value);
    }
}