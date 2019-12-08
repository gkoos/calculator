#!/usr/bin/env php

<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Arqiva\Calculator\CalculatorCommand;

$app = new Application('Calculator', 'v0.1.0');
$app->add(new CalculatorCommand());
$app->run();