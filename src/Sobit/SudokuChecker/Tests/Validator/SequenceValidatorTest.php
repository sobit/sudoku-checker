<?php

namespace Sobit\SudokuChecker\Tests\Validator;

use PHPUnit_Framework_TestCase;
use Sobit\SudokuChecker\Validator\SequenceValidator;

/**
 * Class SequenceValidatorTest
 * @package Sobit\SudokuChecker\Tests\Validator
 */
class SequenceValidatorTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var SequenceValidator
     */
    private $validator;

    public function setUp()
    {
        $this->validator = new SequenceValidator(1);
    }

    public function testCorrectArray()
    {
        $array = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
        $this->validator->validate($array);
    }

    public function testCorrectArrayWithRandomOrder()
    {
        $array = array(4, 5, 6, 1, 2, 3, 9, 8, 7);
        $this->validator->validate($array);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testArrayWithMissingElements()
    {
        $array = array(1, 2, 3, 5, 6, 7, 8, 9);
        $this->validator->validate($array);
    }

    public function testDifferentSteps()
    {
        for ($i = 2; $i <= 5; $i++) {
            $array = array(1 * $i, 2 * $i, 3 * $i, 4 * $i, 5 * $i);
            $validator = new SequenceValidator($i);
            $validator->validate($array);
        }
    }

}