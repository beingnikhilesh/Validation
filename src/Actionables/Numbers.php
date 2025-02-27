<?php

namespace beingnikhilesh\Validation\Actionables;

/**
 *  Class to provide function relating to Number Validations
 *  v0.0.1 
 * 
 */

use Respect\Validation\Validator as v;

class Numbers extends Actionable
{

    # Actionable Classes
    protected $actionables = [
        'isNumber' => '_isNumber',
        'isIndianPincode' => '_isIndianPincode',
        'isAmount' => '_isAmount',
        'isPositiveNumber' => '_isPositiveNumber',
        'isNegativeNumber' => '_isNegativeNumber',
        'isDecimalNumber' => '_isAmount',

    ];

    /**
     * Validate a Number. (Integer or Decimal)
     */
    function _isNumber()
    {
        return [
            'validation' => v::regex('-?(0|[1-9]\d*)(?<!-0)'),
            'regex' => '-?(0|[1-9]\d*)(?<!-0)',
        ];
    }

    /**
     * Validate Amount i.e. is Numeric with Decimals
     */
    function _isAmount(array $params = []): array
    {
        # Decide on the No of Decimals, default 2
        $decimals = (!isset($params['decimals']) or !is_int($params['decimals'])) ? 2 : $params['decimals'];

        return [
            'validation' => v::decimals($decimals),
        ];
    }

    /**
     * Validate Positive Number
     */
    function _isPositiveNumber()
    {
        return [
            'validation' => v::positive(),
        ];
    }

    /**
     * Validate Negative Number
     */
    function _isNegativeNumber()
    {
        return [
            'validation' => v::negative(),
        ];
    }

    /**
     *  Validate if the given input is within the Range provided
     *  @param  array   $input      Values to check the Range
     *                                  min - minimum Range / From, max - maximum Range / To
     * 
     *  @return array               Array containing the validation Object
     *                                  validation - Validation Object
     */
    function lengthRange(array $params = []): array
    {
        # Check if any one of Min or Max is not Set. They are Mandatory
        if (
            (!isset($params['min']) or !is_int($params['min']))
            or (!isset($params['max']) or !is_int($params['max']))
            or @$params['max'] < @$params['min']
        )
            return [
                'validation' => v::no(),
            ];

        # Return the Actual Validation
        return [
            'validation' => v::intVal()->between($params['min'], $params['max']),
        ];
    }
}
