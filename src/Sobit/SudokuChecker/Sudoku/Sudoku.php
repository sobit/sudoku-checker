<?php

namespace Sobit\SudokuChecker\Sudoku;

use Sobit\SudokuChecker\Validator\DimensionValidator;

/**
 * Class Sudoku
 */
class Sudoku
{

    /**
     * @var string
     */
    private $rowClass;
    /**
     * @var string
     */
    private $columnClass;
    /**
     * @var string
     */
    private $boxClass;
    /**
     * @var DimensionValidator
     */
    private $dimensionValidator;
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
     * @param string $rowClass
     * @param string $columnClass
     * @param string $boxClass
     * @param DimensionValidator $dimensionValidator
     */
    public function __construct(array $sudoku, $rowClass, $columnClass, $boxClass, DimensionValidator $dimensionValidator)
    {
        $this->rowClass = $rowClass;
        $this->columnClass = $columnClass;
        $this->boxClass = $boxClass;
        $this->dimensionValidator = $dimensionValidator;

        $this->dimensionValidator->validate($sudoku, 9, 9);

        $this->initRows($sudoku);
        $this->initColumns($sudoku);
        $this->initBoxes($sudoku);
    }

    /**
     * @param array $sudoku
     */
    private function initRows(array $sudoku)
    {
        foreach ($sudoku as $row) {
            $this->rows[] = new $this->rowClass($row);
        }
    }

    /**
     * @param array $sudoku
     */
    private function initColumns(array $sudoku)
    {
        array_unshift($sudoku, null);
        $sudoku = call_user_func_array('array_map', $sudoku);

        foreach ($sudoku as $column) {
            $this->columns[] = new $this->columnClass($column);
        }
    }

    /**
     * @param array $sudoku
     */
    private function initBoxes(array $sudoku)
    {
        for ($i = 0; $i < 3; $i++) {
            $box = array_slice($sudoku, 3 * $i, 3);

            for ($j = 0; $j < 3; $j++) {
                $boxCopy = $box;
                foreach ($boxCopy as $key => $boxRow) {
                    $boxCopy[$key] = array_slice($boxRow, 3 * $j, 3);
                }

                $this->dimensionValidator->validate($boxCopy, 3, 3);
                $this->boxes = new $this->boxClass($boxCopy);
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