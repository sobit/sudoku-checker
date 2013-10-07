<?php

namespace Sobit\SudokuChecker\Sudoku;

/**
 * Class SudokuColumn
 */
class SudokuColumn
{

    /**
     * @var array
     */
    private $column;

    /**
     * @param array $column
     */
    public function __construct(array $column)
    {
        $this->column = $column;
    }

    /**
     * @return array
     */
    public function getAsArray()
    {
        return $this->column;
    }

}