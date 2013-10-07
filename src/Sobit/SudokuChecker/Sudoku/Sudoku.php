<?php

namespace Sobit\SudokuChecker\Sudoku;

use Sobit\SudokuChecker\Factory\SudokuBoxFactory;
use Sobit\SudokuChecker\Factory\SudokuColumnFactory;
use Sobit\SudokuChecker\Factory\SudokuRowFactory;
use Sobit\SudokuChecker\Helper\ArrayHelper;
use Sobit\SudokuChecker\Validator\DimensionValidator;

/**
 * Class Sudoku
 */
class Sudoku
{

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
     * @var ArrayHelper
     */
    private $arrayHelper;
    /**
     * @var SudokuRow[]
     */
    private $rows;
    /**
     * @var SudokuColumn[]
     */
    private $columns;
    /**
     * @var SudokuBox[]
     */
    private $boxes;

    /**
     * @param array $sudoku
     * @param SudokuRowFactory $srf
     * @param SudokuColumnFactory $scf
     * @param SudokuBoxFactory $sbf
     * @param ArrayHelper $ah
     */
    public function __construct(array $sudoku, SudokuRowFactory $srf, SudokuColumnFactory $scf, SudokuBoxFactory $sbf, ArrayHelper $ah)
    {
        $this->rowFactory = $srf;
        $this->columnFactory = $scf;
        $this->boxFactory = $sbf;
        $this->arrayHelper = $ah;

        $this->initRows($sudoku);
        $this->initColumns($sudoku);
        $this->initBoxes($sudoku);
    }

    /**
     * @param array $sudoku
     */
    private function initRows(array $sudoku)
    {
        for ($i = 0; $i < 9; $i++) {
            $extractedRow = $this->arrayHelper->extract($sudoku, $i, 0, 1, 9);
            $this->rows[] = $this->rowFactory->build($extractedRow);
        }
    }

    /**
     * @param array $sudoku
     */
    private function initColumns(array $sudoku)
    {
        for ($i = 0; $i < 9; $i++) {
            $extractedColumn = $this->arrayHelper->extract($sudoku, 0, $i, 9, 1);
            $this->columns[] = $this->columnFactory->build($extractedColumn);
        }
    }

    /**
     * @param array $sudoku
     */
    private function initBoxes(array $sudoku)
    {
        for ($i = 0; $i < 9; $i = $i + 3) {
            for ($j = 0; $j < 9; $j = $j + 3) {
                $extractedBox = $this->arrayHelper->extract($sudoku, $i, $j, 3, 3);
                $this->boxes[] = $this->boxFactory->build($extractedBox);
            }
        }
    }

    /**
     * @return SudokuRow[]
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @return SudokuColumn[]
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @return SudokuBox[]
     */
    public function getBoxes()
    {
        return $this->boxes;
    }

}