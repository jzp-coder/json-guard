<?php

namespace JzpCoder\JsonGuard\Constraint;

use League\JsonGuard\ConstraintInterface;
use League\JsonGuard\Validator;
use function League\JsonGuard\error;

class IsNumeric implements ConstraintInterface
{
    public function validate($value, $parameter, Validator $validator)
    {
        if ((true === $parameter && is_numeric($value))
            || (false === $parameter && !is_numeric($value))
        ) {
            return null;
        }

        return error('The value must be a numeric', $validator);
    }
}