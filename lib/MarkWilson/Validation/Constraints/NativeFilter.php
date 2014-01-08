<?php

namespace MarkWilson\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

/**
 * Native PHP filter constraint
 *
 * @package MarkWilson\Validation\Constraints
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
class NativeFilter extends Constraint
{
    /**
     * Constraint message
     *
     * @var string
     */
    public $message = 'Value is invalid';

    /**
     * Filter type
     *
     * @var integer
     */
    public $filter;

    /**
     * {@inheritDoc}
     */
    public function __construct($options = null)
    {
        if (isset($options['filter'])) {
            $this->filter = $options['filter'];

            unset($options['filter']);
        }

        parent::__construct($options);

        if (!is_int($this->filter)) {
            throw new ConstraintDefinitionException('The option "filter" must be a valid FILTER_ constant in constraint ' . __CLASS__ . '.');
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getRequiredOptions()
    {
        return array('filter');
    }
}
