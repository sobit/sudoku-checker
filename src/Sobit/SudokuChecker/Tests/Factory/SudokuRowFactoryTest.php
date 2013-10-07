<?php

namespace Sobit\SudokuChecker\Tests\Factory;

use PHPUnit_Framework_TestCase;
use RuntimeException;
use Sobit\SudokuChecker\Factory\SudokuRowFactory;

/**
 * Class SudokuRowFactoryTest
 *
 * @package Sobit\SudokuChecker\Tests\Factory
 */
class SudokuRowFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var SudokuRowFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new SudokuRowFactory();
    }

    public function testBuild()
    {
        $row = array(
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
        );

        $sudokuRow = $this->factory->build($row);
        $this->assertInstanceOf('\Sobit\SudokuChecker\Sudoku\SudokuRow', $sudokuRow);
        $this->assertEquals(array(1, 2, 3, 4, 5, 6, 7, 8, 9), $sudokuRow->getAsArray());
    }

    /**
     * @expectedException RuntimeException
     */
    public function testBuildWithWrongRowLength()
    {
        $row = array(
            array(1, 2, 3),
        );

        $this->factory->build($row);
    }

}