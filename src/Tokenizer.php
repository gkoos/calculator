<?php

namespace Arqiva\Calculator;

use Arqiva\Calculator\Operation;

class Tokenizer
{
    const INITIALIZE_COMMAND = "";
    const ADD_COMMAND = "add";
    const SUBTRACT_COMMAND = "subtract";
    const MULTIPLY_COMMAND = "multiply";
    const DIVIDE_COMMAND = "divide";
    const POWER_COMMAND = "power";
    const MOD_COMMAND = "mod";

    const FLOAT_REGEX = "[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?";
    const LINE_REGEX = "^([a-z]*)(" . self::FLOAT_REGEX . ")$";

    static public function getCommand(string $line, Calculator $calculator)
    {
        $trimmedLine = preg_replace("/\s/", "", $line);

        $match = preg_match("/" . self::LINE_REGEX . "/i", $trimmedLine, $matches);

        if (!$match) {
            throw new \Exception("syntax error");
        }

        $command = $matches[1];
        $operand = (float) $matches[2];

        switch($command) {
            case self::INITIALIZE_COMMAND:
                return new Operation\InitializationOperation($calculator, $operand);
                break;
            case self::ADD_COMMAND:
                return new Operation\AdditionOperation($calculator, $operand);
            case self::SUBTRACT_COMMAND:
                return new Operation\SubtractionOperation($calculator, $operand);
            case self::MULTIPLY_COMMAND:
                return new Operation\MultiplicationOperator($calculator, $operand);
            case self::DIVIDE_COMMAND:
                return new Operation\DivisionOperator($calculator, $operand);
            case self::POWER_COMMAND:
                return new Operation\PowerOperation($calculator, $operand);
            case self::MOD_COMMAND:
                return new Operation\ModOperation($calculator, $operand);
            default:
                throw new \Exception("unknown command: $command");
        }
    }
}