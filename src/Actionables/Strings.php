<?php

namespace beingnikhilesh\Validation\Actionables;

/**
 *  Class to provide function relating to Strings Validations
 *  v0.0.1 
 * 
 */

use beingnikhilesh\Validation\Enums\Validator;
use Respect\Validation\Validator as v;

class Strings extends Actionable
{
    # Actionable Classes
    protected $actionables = [
        'isString' => '_isString',
        'isReferenceNo' => '_isReferenceNo',
        'isName' => '_isName',
        'isAddress' => '_isAddress',
        'isQueryString' => '_isQueryString',
        'isJson' => '_isJson',
    ];

    /**
     * Validate a String i.e. A-Z, a-z, 0-9 without Spaces and Characters 
     */
    function _isString()
    {
        return [
            'validation' => v::alnum(),
            'regex' => '[A-Za-z0-9]',
            'allowedValidators' => [
                Validator::AllowNull,
                Validator::AllowCharacters,
                Validator::Withspace,
                Validator::NoSpaces,
                Validator::UTF16,
            ]
        ];
    }

    /** 
     *  Custom Function - Validate a Reference No.
     *      Contains A-Z, a-z, 0-9 & - character
     */
    function _isReferenceNo()
    {
        return [
            'validation' => v::alnum('-'),
        ];
    }

    /**
     *  Validates if a string provided is a valid Query String
     */
    function _isQueryString()
    {
        return [
            'validation' => v::regex('/^([a-zA-Z0-9._~-]*=[a-zA-Z0-9._~-]*)(?:&[a-zA-Z0-9._~-]*=[a-zA-Z0-9._~-]*)*$/')
        ];
    }

    function _isName()
    {
        return [
            'validation' => v::regex("/^[A-Za-z]+(?:[ '-][A-Za-z]+)*$/"),
            'regex' => "[A-Za-z]+(?:[ '-][A-Za-z]+)*",
            'allowedValidators' => [
                Validator::AllowNull,
                Validator::Withspace
            ]
        ];
    }

    /**
     * Validate an Address (Multi-line Allowed)
     */
    function _isAddress()
    {
        return [
            'validation' => v::regex('/^(\w*\s*[\*\@\$\%\^\~\<\>\?\!\#\-\,\/\.\(\)\&]*)+$/mi'),
            'regex' => '\w*\s*[\*\@\$\%\^\~\<\>\?\!\#\-\,\/\.\(\)\&]*',
            'flags' => 'mi',
            'allowedValidators' => [
                Validator::AllowNull,
                Validator::AllowCharacters,
                Validator::Withspace,
                Validator::NoSpaces,
                Validator::UTF16,
            ]
        ];
    }

    /**
     * Validate a Json
     */
    function _isJson()
    {

        return [
            'validation' => v::json(),
        ];
    }
}
