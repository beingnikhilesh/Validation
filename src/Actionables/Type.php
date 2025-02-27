<?php

namespace beingnikhilesh\Validation\Actionables;

/**
 *  Class to provide function relating to Type Validations
 *
 *  v0.0.1 
 * 
 */

use Respect\Validation\Validator as v;

class Type extends Actionable
{

    # Actionable Classes
    protected $actionables = [
        'validateArrayType' => 'ArrayType',
        'validateBoolType' => 'BoolType',
        'validateObjectType' => 'ObjectType',
        'validateStringType' => 'StringType',
        'validateIntegerType' => 'IntegerType',
        'validateFloatType' => 'FloatType',
        'validateNumericType' => 'NumericType',
    ];

    # Function to validate Array
    function ArrayType()
    {
        return [
            'validation' => v::arrayType(),
        ];
    }

    #Function to validate Bool
    function BoolType()
    {
        return [
            'validation' => v::boolType(),
        ];
    }

    # Function to validate Object
    function ObjectType()
    {
        return [
            'validation' => v::objectType(),
        ];
    }

    # Function to validate string
    function StringType()
    {
        return [
            'validation' => v::stringType(),
        ];
    }

    # Function to validate Integer
    function IntegerType()
    {
        return [
            'validation' => v::intType(),
        ];
    }

    # Function to validate Float
    function FloatType()
    {
        return [
            'validation' => v::floatType(),
        ];
    }

    # Function to validate Numeric
    function NumericType()
    {
        return [
            'validation' => v::numeric(),
        ];
    }
}
