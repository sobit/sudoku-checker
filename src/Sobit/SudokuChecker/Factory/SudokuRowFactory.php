<?php

namespace Sobit\SudokuChecker\Factory;

use Sobit\SudokuChecker\Helper\ArrayHelper;
use Sobit\SudokuChecker\Sudoku\SudokuRow;
use Sobit\SudokuChecker\Validator\DimensionValidator;

/**
 * Class SudokuRowFactory
 *
 * @package Sobit\SudokuChecker\Factory
 */
class SudokuRowFactory
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
        $this->class = (null === $class) ? '\Sobit\SudokuChecker\Sudoku\SudokuRow' : $class;
        $this->dimensionValidator = (null === $dv) ? new DimensionValidator() : $dv;
        $this->arrayHelper = (null === $ah) ? new ArrayHelper() : $ah;
    }

    /**
     * @param array $extractedRow
     *
     * @return SudokuRow
     */
    public function build(array $extractedRow)
    {
        $this->dimensionValidator->validate($extractedRow, 1, 9);

        $row = $this->arrayHelper->convertTo1d($extractedRow);

        return new $this->class($row);
    }

}