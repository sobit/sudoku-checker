<?php

namespace Sobit\SudokuChecker\Tests\Factory;

use PHPUnit_Framework_TestCase;
use RuntimeException;
use Sobit\SudokuChecker\Factory\SudokuBoxFactory;

/**
 * Class SudokuBoxFactoryTest
 *
 * @package Sobit\SudokuChecker\Tests\Factory
 */
class SudokuBoxFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var SudokuBoxFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new SudokuBoxFactory();
    }

    public function testBuild()
    {
        $box = array(
            array(1, 2, 3),
            array(4, 5, 6),
            array(7, 8, 9),
        );

        $sudokuBox = $this->factory->build($box);
        $this->assertInstanceOf('\Sobit\SudokuChecker\Sudoku\SudokuBox', $sudokuBox);
        $this->assertEquals(array(1, 2, 3, 4, 5, 6, 7, 8, 9), $sudokuBox->getAs1dArray());
        $this->assertEquals($box, $sudokuBox->getAs2dArray());
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