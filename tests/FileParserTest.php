<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Symfony\Component\Console\Output\NullOutput;

use Arqiva\Calculator\FileParser;

final class FileParserTest extends TestCase
{
    /**
     * @var FileParser
     */
    protected $fileParser;

    public function setUp(): void
    {
        $this->fileParser = new FileParser(new NullOutput());
    }

    public function testMalformedDataSilentlyFails(): void
    {
        $calculator = $this->fileParser->parse("tests/fixtures/malformed.txt");
        $this->assertEquals($calculator->getValue(), 12.0);
    }

    public function testWellformedDataSilentlyFails(): void
    {
        $calculator = $this->fileParser->parse("tests/fixtures/wellformed.txt");
        $this->assertEquals($calculator->getValue(), 2.0);
    }

    public function testDivisionByZeroSilentlyFails(): void
    {
        $calculator = $this->fileParser->parse("tests/fixtures/divisionby0.txt");
        $this->assertEquals($calculator->getValue(), 10.0);
    }

    public function testOverflowSilentlyFails(): void
    {
        $calculator = $this->fileParser->parse("tests/fixtures/overflow.txt");
        $this->assertEquals($calculator->getValue(), 1e10);
    }
}
