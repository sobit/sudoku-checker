<?php

/**
 * Class SudokuChecker
 */
class SudokuChecker
{

    /**
     * @var UniqueValidator
     */
    private $uniqueValidator;
    /**
     * @var SequenceValidator
     */
    private $sequenceValidator;

    /**
     * @param UniqueValidator $uv
     * @param SequenceValidator $sv
     */
    public function __construct(UniqueValidator $uv, SequenceValidator $sv)
    {
        $this->uniqueValidator = $uv;
        $this->sequenceValidator = $sv;
    }

    /**
     * @param Sudoku $sudoku
     */
    public function check(Sudoku $sudoku)
    {
        foreach ($sudoku->getRows() as $row) {
            $this->uniqueValidator->validate($row->getAsArray());
            $this->sequenceValidator->validate($row->getAsArray());
        }

        foreach ($sudoku->getColumns() as $column) {
            $this->uniqueValidator->validate($column->getAsArray());
            $this->sequenceValidator->validate($column->getAsArray());
        }

        foreach ($sudoku->getBoxes() as $box) {
            $this->uniqueValidator->validate($box->getAs1dArray());
            $this->sequenceValidator->validate($box->getAs1dArray());
        }
    }

}