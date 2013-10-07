<?php

namespace Sobit\SudokuChecker\Factory;

use Sobit\SudokuChecker\Helper\ArrayHelper;
use Sobit\SudokuChecker\Sudoku\SudokuColumn;
use Sobit\SudokuChecker\Validator\DimensionValidator;

/**
 * Class SudokuColumnFactory
 *
 * @package Sobit\SudokuChecker\Factory
 */
class SudokuColumnFactory
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
        $this->class = (null === $class) ? '\Sobit\SudokuChecker\Sudoku\SudokuColumn' : $class;
        $this->dimensionValidator = (null === $dv) ? new DimensionValidator() : $dv;
        $this->arrayHelper = (null === $ah) ? new ArrayHelper() : $ah;
    }

    /**
     * @param array $extractedColumn
     *
     * @return SudokuColumn
     */
    public function build(array $extractedColumn)
    {
        $this->dimensionValidator->validate($extractedColumn, 9, 1);

        $row = $this->arrayHelper->convertTo1d($extractedColumn);

        return new $this->class($row);
    }

}