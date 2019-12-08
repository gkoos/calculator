<?php

namespace Arqiva\Calculator\Operation;

class InitializationOperation extends AbstractOperation
{
    public function execute()
    {
        $operand = $this->operand;
        $this->calculator->initialize($operand);
    }
}