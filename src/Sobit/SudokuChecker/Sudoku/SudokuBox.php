<?php

namespace Sobit\SudokuChecker\Sudoku;

/**
 * Class SudokuBox
 */
class SudokuBox
{

    /**
     * @var array
     */
    private $box;

    /**
     * @param array $box
     */
    public function __construct(array $box)
    {
        $this->box = $box;
    }

    /**
     * @return array
     */
    public function getAs1dArray()
    {
        $array = array();

        foreach ($this->box as $row) {
            foreach ($row as $element) {
                $array[] = $element;
            }
        }

        return $array;
    }

    /**
     * @return array
     */
    public function getAs2dArray()
    {
        return $this->box;
    }

}