<?php

namespace spec\JzpCoder\JsonGuard\Constraint;

use JzpCoder\JsonGuard\Constraint\IsNumeric;
use League\JsonGuard\ValidationError;
use League\JsonGuard\Validator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IsNumericSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(IsNumeric::class);
    }

    function it_should_implement_the_interface()
    {
        $this->shouldImplement(\League\JsonGuard\ConstraintInterface::class);
    }

    function it_will_return_error_if_value_is_not_numeric_as_requested()
    {
        $validator = new Validator((object)[], (object)[]);
        $this->validate('not numeric', true, $validator)
            ->shouldReturnAnInstanceOf(ValidationError::class);
    }

    function it_will_return_null_if_value_is_not_numeric_as_requested()
    {
        $validator = new Validator((object)[], (object)[]);
        $this->validate('not numeric', false, $validator)
            ->shouldReturn(null);
    }

    function it_will_return_error_if_value_is_numeric_as_not_requested()
    {
        $validator = new Validator((object)[], (object)[]);
        $this->validate(3, false, $validator)
            ->shouldReturnAnInstanceOf(ValidationError::class);
    }

    function it_will_return_null_if_value_is_numeric_as_requested()
    {
        $validator = new Validator((object)[], (object)[]);
        $this->validate(3, true, $validator)
            ->shouldReturn(null);
    }
}
