# Symfony2 Validation native PHP filter constraint

Note: currently only works for validator component 2.2.x

Native PHP filter constraint for Symfony2 validator component.

## Install

Add `markwilson/symfony2-validator-native-filter` to composer.json requires.

## Usage

`NativeFilter` requires a `filter` option which must be one of the `FILTER_` prefixed constants.

e.g.

```` php
use MarkWilson\Validator\Constraints\NativeFilter;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

$constraint = new NativeFilter(
    array(
        'filter' => FILTER_VALIDATE_FLOAT
    )
);

$validator = Validation::createValidator();
$validator->validateValue($value, $constraint);
````
