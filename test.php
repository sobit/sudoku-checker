<?php

require_once 'Checker/SudokuChecker.php';

require_once 'Sudoku/Sudoku.php';
require_once 'Sudoku/SudokuBox.php';
require_once 'Sudoku/SudokuColumn.php';
require_once 'Sudoku/SudokuRow.php';

require_once 'Validator/DimensionValidator.php';
require_once 'Validator/SequenceValidator.php';
require_once 'Validator/UniqueValidator.php';

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

$sudoku = new Sudoku($sudokuArray, 'SudokuRow', 'SudokuColumn', 'SudokuBox', new DimensionValidator());
$checker = new SudokuChecker(new UniqueValidator(), new SequenceValidator(1));
$checker->check($sudoku);

echo 'Sudoku validated';