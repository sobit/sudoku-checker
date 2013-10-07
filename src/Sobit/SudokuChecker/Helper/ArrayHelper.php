<?php

namespace Sobit\SudokuChecker\Helper;
use InvalidArgumentException;

/**
 * Class ArrayHelper
 *
 * @package Sobit\SudokuChecker\Helper
 */
class ArrayHelper
{

    /**
     * @param array $array
     *
     * @throws InvalidArgumentException
     *
     * @return array
     */
    public function transpose(array $array)
    {
        $array = $this->resetKeys($array);
        $transposed = array();

        for ($i = 0; $i < count($array); $i++) {
            if (!is_array($array[$i])) {
                throw new InvalidArgumentException('Only two dimensional arrays can be transposed.');
            }

            for ($j = 0; $j < count($array[$i]); $j++) {
                $transposed[$j][] = $array[$i][$j];
            }
        }

        return $transposed;
    }

    /**
     * @param array $array
     *
     * @return array
     */
    public function resetKeys(array $array)
    {
        $array = array_values($array);
        foreach ($array as $key => $element) {
            if (is_array($element)) {
                $array[$key] = $this->resetKeys($element);
            }
        }

        return $array;
    }

    /**
     * @param array   $array
     * @param integer $rowOffset
     * @param integer $columnOffset
     * @param integer $rowLength
     * @param integer $columnLength
     *
     * @return array
     */
    public function extract(array $array, $rowOffset, $columnOffset, $rowLength, $columnLength)
    {
        $array = $this->resetKeys($array);

        $array = array_slice($array, $rowOffset, $rowLength);
        foreach ($array as &$row) {
            $row = array_slice($row, $columnOffset, $columnLength);
        }

        return $array;
    }

    /**
     * @param array $array
     *
     * @return array
     */
    public function convertTo1d(array $array)
    {
        $converted = array();

        foreach ($array as $element) {
            if (is_array($element)) {
                $converted = array_merge($converted, $this->convertTo1d($element));
            } else {
                $converted[] = $element;
            }
        }

        return $converted;
    }

}