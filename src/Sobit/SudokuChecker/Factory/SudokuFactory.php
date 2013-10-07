<?php

namespace Sobit\SudokuChecker\Factory;

use Sobit\SudokuChecker\Helper\ArrayHelper;
use Sobit\SudokuChecker\Sudoku\Sudoku;
use Sobit\SudokuChecker\Validator\DimensionValidator;

/**
 * Class SudokuFactory
 *
 * @package Sobit\SudokuChecker\Factory
 */
class SudokuFactory
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
     * @var SudokuRowFactory
     */
    private $rowFactory;
    /**
     * @var SudokuColumnFactory
     */
    private $columnFactory;
    /**
     * @var SudokuBoxFactory
     */
    private $boxFactory;

    /**
     * @param null $class
     * @param DimensionValidator $dv
     * @param ArrayHelper $ah
     * @param SudokuRowFactory $srf
     * @param SudokuColumnFactory $scf
     * @param SudokuBoxFactory $sbf
     */
    public function __construct($class = null, DimensionValidator $dv = null, ArrayHelper $ah = null, SudokuRowFactory $srf = null, SudokuColumnFactory $scf = null, SudokuBoxFactory $sbf = null)
    {
        $this->class = (null === $class) ? '\Sobit\SudokuChecker\Sudoku\Sudoku' : $class;
        $this->dimensionValidator = (null === $dv) ? new DimensionValidator() : $dv;
        $this->arrayHelper = (null === $ah) ? new ArrayHelper() : $ah;
        $this->rowFactory = (null === $srf) ? new SudokuRowFactory() : $srf;
        $this->columnFactory = (null === $scf) ? new SudokuColumnFactory() : $scf;
        $this->boxFactory = (null === $sbf) ? new SudokuBoxFactory() : $sbf;
    }

    /**
     * @param array $sudoku
     *
     * @return Sudoku
     */
    public function build(array $sudoku)
    {
        $this->dimensionValidator->validate($sudoku, 9, 9);

        return new $this->class($sudoku, $this->rowFactory, $this->columnFactory, $this->boxFactory, $this->arrayHelper);
    }

}