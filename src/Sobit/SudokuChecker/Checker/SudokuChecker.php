<?php

namespace Sobit\SudokuChecker\Checker;

use Sobit\SudokuChecker\Sudoku\Sudoku;
use Sobit\SudokuChecker\Validator\SequenceValidator;
use Sobit\SudokuChecker\Validator\UniqueValidator;

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
    public function __construct(UniqueValidator $uv = null, SequenceValidator $sv = null)
    {
        $this->uniqueValidator = (null === $uv) ? new UniqueValidator() : $uv;
        $this->sequenceValidator = (null === $sv) ? new SequenceValidator(1) : $sv;
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