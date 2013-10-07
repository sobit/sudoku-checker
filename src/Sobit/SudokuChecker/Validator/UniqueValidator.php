<?php

namespace Sobit\SudokuChecker\Validator;

use RuntimeException;

/**
 * Class UniqueValidator
 *
 * @package Sobit\SudokuChecker\Validator
 */
class UniqueValidator
{

    /**
     * @param array $array
     *
     * @throws RuntimeException
     */
    public function validate(array $array)
    {
        $newArray = array();

        foreach ($array as $element) {
            if (in_array($element, $newArray)) {
                throw new RuntimeException(sprintf('Array [%s] is not unique.', implode(', ', $array)));
            }

            $newArray[] = $element;
        }
    }

}