<?php

declare(strict_types=1);

namespace Arqiva\Calculator;

use Symfony\Component\Console\Output\OutputInterface;

use Arqiva\Calculator\Tokenizer;

class FileParser
{
    protected $output;

    protected $calculator;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
        $this->calculator = new Calculator();
    }

    public function parse(string $fileName): Calculator
    {
        $f = $this->openFile($fileName);
        $lineNum = 1;
        while (($line = fgets($f, 4096)) !== false) {
            try {
                if (preg_match("/\S/", $line)) {
                    $command = Tokenizer::getCommand($line, $this->calculator);
                    $command->execute();
                }
            }
            catch (\Exception $e) {
                $this->output->writeln("file $fileName line $lineNum: " . $e->getMessage());
            }
            finally {
                $lineNum++;
            }
        }

        fclose($f);
        return $this->calculator;
    }

    protected function openFile(string $fileName)
    {
        if (!file_exists($fileName)) {
            throw new \Exception("file $fileName does not exist");
        }

        $fileHandle = @fopen($fileName, "r");

        if (!$fileHandle) {
            throw new \Exception("could not open file $fileName");
        }

        return $fileHandle;
    }
}