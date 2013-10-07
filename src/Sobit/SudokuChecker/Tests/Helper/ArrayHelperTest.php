<?php

namespace Sobit\SudokuChecker\Tests\Helper;

use InvalidArgumentException;
use PHPUnit_Framework_TestCase;
use Sobit\SudokuChecker\Helper\ArrayHelper;

class ArrayHelperTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var ArrayHelper
     */
    private $helper;

    public function setUp()
    {
        $this->helper = new ArrayHelper();
    }

    public function testTranspose3x3()
    {
        $expected = array(
            array(1, 4, 7),
            array(2, 5, 8),
            array(3, 6, 9),
        );

        $transposed = $this->helper->transpose($this->getMatrix(3, 3));
        $this->assertEquals($expected, $transposed);
    }

    public function testTranspose3x1()
    {
        $expected = array(
            array(1, 2, 3),
        );

        $transposed = $this->helper->transpose($this->getMatrix(3, 1));
        $this->assertEquals($expected, $transposed);
    }

    public function testTranspose1x3()
    {
        $expected = array(
            array(1),
            array(2),
            array(3),
        );

        $transposed = $this->helper->transpose($this->getMatrix(1, 3));
        $this->assertEquals($expected, $transposed);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testTranspose0x1()
    {
        $array = array(1);
        $this->helper->transpose($array);
    }

    public function testResetKeys()
    {
        $array = array(1, 2, 3, 'test' => 4, array('first' => 1, 'second' => 2, 3));
        $expected = array(1, 2, 3, 4, array(1, 2, 3));
        $arrayWithoutKeys = $this->helper->resetKeys($array);
        $this->assertEquals($expected, $arrayWithoutKeys);
    }

    public function testExtractBox()
    {
        $expected = array(
            array(1, 2),
            array(4, 5),
        );

        $extracted = $this->helper->extract($this->getMatrix(3, 3), 0, 0, 2, 2);
        $this->assertEquals($expected, $extracted);
    }

    public function testExtractRow()
    {
        $expected = array(
            array(1, 2, 3),
        );

        $extracted = $this->helper->extract($this->getMatrix(3, 3), 0, 0, 1, 3);
        $this->assertEquals($expected, $extracted);
    }

    public function testExtractColumn()
    {
        $expected = array(
            array(1),
            array(4),
            array(7),
        );

        $extracted = $this->helper->extract($this->getMatrix(3, 3), 0, 0, 3, 1);
        $this->assertEquals($expected, $extracted);
    }

    public function testConvertMatrixTo1d()
    {
        $expected = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
        $converted = $this->helper->convertTo1d($this->getMatrix(3, 3));
        $this->assertEquals($expected, $converted);
    }

    public function testConvertRowTo1d()
    {
        $expected = array(1, 2, 3);
        $converted = $this->helper->convertTo1d($this->getMatrix(1, 3));
        $this->assertEquals($expected, $converted);
    }

    public function testConvertColumnTo1d()
    {
        $expected = array(1, 2, 3);
        $converted = $this->helper->convertTo1d($this->getMatrix(3, 1));
        $this->assertEquals($expected, $converted);
    }

    /**
     * @param integer $rows
     * @param integer $columns
     *
     * @return array
     */
    private function getMatrix($rows, $columns)
    {
        $matrix = array();

        $number = 1;
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $matrix[$i][$j] = $number;
                $number++;
            }
        }

        return $matrix;
    }

}