<?php

namespace Sobit\SudokuChecker\Factory;

use Sobit\SudokuChecker\Helper\ArrayHelper;
use Sobit\SudokuChecker\Sudoku\SudokuBox;
use Sobit\SudokuChecker\Validator\DimensionValidator;

/**
 * Class SudokuBoxFactory
 *
 * @package Sobit\SudokuChecker\Factory
 */
class SudokuBoxFactory
{

    /**
     * @var string
     */
    private $class;
    /**
     * @var DimensionValidator
     */
    private $dimensionValidator;
    /**
     * @var ArrayHelper
     */
    private $arrayHelper;

    /**
     * @param string|null $class
     * @param DimensionValidator|null $dv
     * @param ArrayHelper $ah
     */
    public function __construct($class = null, DimensionValidator $dv = null, ArrayHelper $ah = null)
    {
        $this->class = (null === $class) ? '\Sobit\SudokuChecker\Sudoku\SudokuBox' : $class;
        $this->dimensionValidator = (null === $dv) ? new DimensionValidator() : $dv;
        $this->arrayHelper = (null === $ah) ? new ArrayHelper() : $ah;
    }

    /**
     * @param array $extractedBox
     *
     * @return SudokuBox
     */
    public function build(array $extractedBox)
    {
        $this->dimensionValidator->validate($extractedBox, 3, 3);

        return new $this->class($extractedBox, $this->arrayHelper);
    }

}