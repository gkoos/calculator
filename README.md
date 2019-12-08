# Technical Test

## Problem: Calculator
Invalid inputs should be logged and input then ignored.

Write some code to calculate a result from a set of instructions.  Instructions comprise of an initial number, followed by keyword and a number that are separated by new lines.  Instructions are loaded from file and results are output to the screen. Any number of Instructions can be specified. Instructions can be any binary operators of your choice (e.g., add, divide, subtract, multiply etc).  The instructions will ignore mathematical precedence. The calculator is then initialised with that first number and the subsequent instructions are applied to that number. Your command line application should be able to accept one or more files and output results of those files to screen.

Examples of the calculator lifecycle might be:

__Example 1.__  
[Input from file]
```
2
add 3
multiply 3
```
[Output to screen]
```
15
```
[Explanation]
```
(3 + 2) * 3 = 15
```

__Example 2.__  
[Input from file]
```
9
multiply 5
```
[Output to screen]
```
45
```
[Explanation]
```
5 * 9 = 45
```

__Example 3.__  
[Input from file]
```
1
```
[Output to screen]
```
1
```

## Assumptions
_1. Your command line application should be able to accept one or more files and output results of those files to screen._  
Sequentially process each file passed to the script.  
__Example__  
[file1.txt]
```
10
add 5
```
[file2.txt]
```
9
subtract 2
```
[Output to screen]
```
15  
9
```

_2. The calculator is then initialised with that first number and the subsequent instructions are applied to that number._    
First we initialise the cvalculator with the number provided in the first line of the input file, then sequentially apply the operations provided. This makes the explanation of _Example 1_ __(2 + 3) * 3 = 15__.
  
_3. Invalid inputs should be logged and input then ignored._  
We silently ignore the invalid line(s) in a file and continue processing and do not discard the whole file.  
For simplicity only on-screen logging is implemented as dealing with cross-cutting concerns may be beyond the scope of a simple exercise.  
If an operation causes overflow or division by 0 it does not get executed.

_4. Any number of Instructions can be specified._  
We don't read the whole file into memory, only process one line at a time.

## Requirements
- PHP 7.2+
- Composer

## Installation
```bash
$ composer install
```

## Usage
From the project root
```bash
$ ./console.php calculate filename [filename2...]
```

## Running Tests
```bash
$ ./vendor/bin/phpunit
```