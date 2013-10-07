<?php

namespace Sobit\SudokuChecker\Tests\Validator;

use PHPUnit_Framework_TestCase;
use Sobit\SudokuChecker\Validator\DimensionValidator;

/**
 * Class DimensionValidatorTest
 *
 * @package Sobit\SudokuChecker\Tests\Validator
 */
class DimensionValidatorTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var DimensionValidator
     */
    private $validator;

    public function setUp()
    {
        $this->validator = new DimensionValidator();
    }

    public function testWithCorrectDimensions()
    {
        $array = array(
            array(1, 2, 3),
            array(4, 5, 6),
            array(7, 8, 9),
        );

        $this->validator->validate($array, 3, 3);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testWithIncorrectDimensions()
    {
        $array = array(
            array(1, 2, 3),
            array(4, 5, 6),
            array(7, 8, 9),
            array(10, 11, 12),
        );

        $this->validator->validate($array, 3, 3);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCorrectDimensionsWithInconsistentRows()
    {
        $array = array(
            array(1, 2, 3),
            array(4, 5, 6, 6),
            array(7, 8, 9),
        );

        $this->validator->validate($array, 3, 3);
    }

}