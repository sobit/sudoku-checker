<?php

namespace Sobit\SudokuChecker\Tests\Factory;

use PHPUnit_Framework_TestCase;
use RuntimeException;
use Sobit\SudokuChecker\Factory\SudokuColumnFactory;

/**
 * Class SudokuColumnFactoryTest
 *
 * @package Sobit\SudokuChecker\Tests\Factory
 */
class SudokuColumnFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var SudokuColumnFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new SudokuColumnFactory();
    }

    public function testBuild()
    {
        $column = array(
            array(1),
            array(2),
            array(3),
            array(4),
            array(5),
            array(6),
            array(7),
            array(8),
            array(9),
        );

        $sudokuColumn = $this->factory->build($column);
        $this->assertInstanceOf('\Sobit\SudokuChecker\Sudoku\SudokuColumn', $sudokuColumn);
        $this->assertEquals(array(1, 2, 3, 4, 5, 6, 7, 8, 9), $sudokuColumn->getAsArray());
    }

    /**
     * @expectedException RuntimeException
     */
    public function testBuildWithWrongColumnLength()
    {
        $column = array(
            array(1),
            array(2),
            array(3),
        );

        $this->factory->build($column);
    }

}