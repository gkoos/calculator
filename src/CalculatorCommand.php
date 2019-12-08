<?php

namespace Arqiva\Calculator;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Arqiva\Calculator\FileParser;

class CalculatorCommand extends SymfonyCommand
{
    public function configure()
    {
        $this->setName('calculator')
            ->setDescription('Simple calculator.')
            ->setHelp('This command reads the operations from the source file(s), executes them and display the results')
            ->addArgument(
                'files',
                InputArgument::IS_ARRAY|InputArgument::REQUIRED,
                'Source files'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $files = $input->getArgument('files');

        foreach($files as $file) {
            try {
                $fileParser = new FileParser($output);
                $resultCalculator = $fileParser->parse($file);
                $output->writeln($resultCalculator->getValue());
            }
            catch (\Exception $e) {
                $output->writeln($e->getMessage());
            }
        }

        return 0;
    }
}