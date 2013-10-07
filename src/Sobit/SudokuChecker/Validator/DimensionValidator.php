<?php

namespace Sobit\SudokuChecker\Validator;

use RuntimeException;

/**
 * Class DimensionValidator
 *
 * @package Sobit\SudokuChecker\Validator
 */
class DimensionValidator
{

    /**
     * @param array   $array
     * @param integer $rows
     * @param integer $columns
     *
     * @throws RuntimeException
     */
    public function validate(array $array, $rows, $columns)
    {
        $isValid = true;

        if (count($array) !== $rows) {
            $isValid = false;
        }

        foreach ($array as $row) {
            if (count($row) !== $columns) {
                $isValid = false;
            }
        }

        if (!$isValid) {
            throw new RuntimeException(sprintf('Invalid array dimensions. Expected %d rows and %d columns.', $rows, $columns));
        }
    }

}