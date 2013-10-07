<?php

namespace Sobit\SudokuChecker\Tests\Checker;

use PHPUnit_Framework_TestCase;
use RuntimeException;
use Sobit\SudokuChecker\Checker\SudokuChecker;
use Sobit\SudokuChecker\Factory\SudokuFactory;
use Sobit\SudokuChecker\Validator\SequenceValidator;
use Sobit\SudokuChecker\Validator\UniqueValidator;

/**
 * Class SudokuCheckerTest
 *
 * @package Sobit\SudokuChecker\Tests\Checker
 */
class SudokuCheckerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var SudokuChecker
     */
    private $checker;

    /**
     * @var SudokuFactory
     */
    private $sudokuFactory;

    public function setUp()
    {
        $this->checker = new SudokuChecker(new UniqueValidator(), new SequenceValidator(1));
        $this->sudokuFactory = new SudokuFactory();
    }

    public function testCorrectSudoku()
    {
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

        $sudoku = $this->sudokuFactory->build($sudokuArray);
        $this->checker->check($sudoku);
    }

    /**
     * @expectedException RuntimeException
     */
    public function testIncorrectSudoku()
    {
        $sudokuArray = array(
            array(5, 3, 4, 6, 7, 8, 9, 1, 2),
            array(6, 7, 2, 1, 5, 5, 3, 4, 8),
            array(1, 9, 8, 3, 4, 2, 5, 6, 7),
            array(8, 5, 9, 7, 6, 1, 4, 2, 3),
            array(4, 2, 6, 8, 5, 3, 7, 9, 1),
            array(7, 1, 3, 9, 2, 4, 8, 5, 6),
            array(9, 6, 1, 5, 3, 7, 2, 8, 4),
            array(2, 8, 7, 4, 1, 9, 6, 3, 5),
            array(3, 4, 5, 2, 8, 6, 1, 7, 9),
        );

        $sudoku = $this->sudokuFactory->build($sudokuArray);
        $this->checker->check($sudoku);
    }

}