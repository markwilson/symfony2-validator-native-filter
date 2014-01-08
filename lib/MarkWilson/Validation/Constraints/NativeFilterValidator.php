<?php

namespace MarkWilson\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Native PHP filter validation class
 *
 * @package MarkWilson\Validation\Constraints
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
class NativeFilterValidator extends ConstraintValidator
{
    /**
     * Checks if the passed value is valid.
     *
     * @param mixed      $value      The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @api
     *
     * @throws \RuntimeException If invalid checksum type is supplied
     */
    public function validate($value, Constraint $constraint)
    {
        $filter = $constraint->filter;

        if (null === filter_var($value, $filter, FILTER_NULL_ON_FAILURE)) {
            $this->context->addViolation($constraint->message);
        }
    }
}
