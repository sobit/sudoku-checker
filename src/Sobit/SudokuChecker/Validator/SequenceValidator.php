<?php

namespace Sobit\SudokuChecker\Validator;

use RuntimeException;

/**
 * Class SequenceValidator
 *
 * @package Sobit\SudokuChecker\Validator
 */
class SequenceValidator
{

    /**
     * @var integer
     */
    private $step;

    /**
     * @param integer $step
     */
    public function __construct($step)
    {
        $this->step = $step;
    }

    /**
     * @param array $array
     *
     * @throws RuntimeException
     */
    public function validate(array $array)
    {
        for ($i = min($array); $i <= max($array); $i = $i + $this->step) {
            if (!in_array($i, $array)) {
                throw new RuntimeException(sprintf('Array [%s] is not sequent.', implode(', ', $array)));
            }
        }
    }

    /**
     * @param integer $step
     *
     * @return SequenceValidator
     */
    public function setStep($step)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * @return integer
     */
    public function getStep()
    {
        return $this->step;
    }

}