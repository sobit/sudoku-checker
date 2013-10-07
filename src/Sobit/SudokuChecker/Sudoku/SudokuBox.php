<?php

namespace Sobit\SudokuChecker\Sudoku;
use Sobit\SudokuChecker\Helper\ArrayHelper;

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
     * @var ArrayHelper
     */
    private $arrayHelper;

    /**
     * @param array $box
     * @param ArrayHelper $ah
     */
    public function __construct(array $box, ArrayHelper $ah)
    {
        $this->box = $box;
        $this->arrayHelper = $ah;
    }

    /**
     * @return array
     */
    public function getAs1dArray()
    {
        return $this->arrayHelper->convertTo1d($this->box);
    }

    /**
     * @return array
     */
    public function getAs2dArray()
    {
        return $this->box;
    }

}