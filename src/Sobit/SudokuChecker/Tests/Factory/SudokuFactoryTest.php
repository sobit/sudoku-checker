<?php

namespace Sobit\SudokuChecker\Tests\Factory;

use PHPUnit_Framework_TestCase;
use RuntimeException;
use Sobit\SudokuChecker\Factory\SudokuFactory;

/**
 * Class SudokuFactoryTest
 *
 * @package Sobit\SudokuChecker\Tests\Factory
 */
class SudokuFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var SudokuFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new SudokuFactory();
    }

    public function testBuild()
    {
        $sudokuArray = array(
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
        );

        $sudoku = $this->factory->build($sudokuArray);
        $this->assertInstanceOf('\Sobit\SudokuChecker\Sudoku\Sudoku', $sudoku);
        $this->assertCount(9, $sudoku->getRows());
        $this->assertCount(9, $sudoku->getColumns());
        $this->assertCount(9, $sudoku->getBoxes());
    }

    /**
     * @expectedException RuntimeException
     */
    public function testBuildWithWrongBoxDimensions()
    {
        $box = array(
            array(1, 2, 3),
            array(1, 2, 3),
        );

        $this->factory->build($box);
    }

}