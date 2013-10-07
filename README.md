Sudoku Checker
==============

[![Build Status](https://travis-ci.org/sobit/sudoku-checker.png)](https://travis-ci.org/sobit/sudoku-checker)

Usage Example
-------------

```php
<?php

use Sobit\SudokuChecker\Checker\SudokuChecker;
use Sobit\SudokuChecker\Factory\SudokuFactory;

$sudokuArray = array(
    array(5, 3, 4, 6, 7, 8, 9, 1, 2),
    array(6, 7, 2, 1, 9, 5, 3, 4, 8),
    array(1, 9, 8, 3, 4, 2, 5, 6, 7),
    array(8, 5, 9, 7, 6, 1, 4, 2, 3),
    array(4, 2, 6, 8, 5, 3, 7, 9, 1),
    array(7, 1, 3, 9, 2, 4, 8, 5, 6),
    array(9, 6, 1, 5, 3, 7, 2, 8, 4),
    array(2, 8, 7, 4, 1, 9, 6, 3, 5),
    array(3, 4, 5, 2, 8, 6, 1, 7, 9),
);

$factory = new SudokuFactory();
$sudoku = $factory->build($sudokuArray);

$checker = new SudokuChecker();

try {
    $checker->check($sudoku);
    echo 'Sudoku is valid.';
} catch (RuntimeException $e) {
    echo 'Sudoku is not valid: '.$e->getMessage();
}
```