<?php

/**
 * Class SudokuRow
 */
class SudokuRow
{

    /**
     * @var array
     */
    private $row;

    /**
     * @param array $row
     */
    public function __construct(array $row)
    {
        $this->row = $row;
    }

    /**
     * @return array
     */
    public function getAsArray()
    {
        return $this->row;
    }

}