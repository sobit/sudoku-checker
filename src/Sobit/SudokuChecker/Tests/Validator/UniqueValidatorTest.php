<?php

namespace Sobit\SudokuChecker\Tests\Validator;

use PHPUnit_Framework_TestCase;
use Sobit\SudokuChecker\Validator\UniqueValidator;

/**
 * Class UniqueValidatorTest
 *
 * @package Sobit\SudokuChecker\Tests\Validator
 */
class UniqueValidatorTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var UniqueValidator
     */
    private $validator;

    public function setUp()
    {
        $this->validator = new UniqueValidator();
    }

    public function testArrayWithUniqueElements()
    {
        $array = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
        $this->validator->validate($array);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testArrayWithDuplicatedElements()
    {
        $array = array(1, 2, 2, 3, 4, 5);
        $this->validator->validate($array);
    }

}