<?php

namespace beingnikhilesh\Validation\Actionables;

use beingnikhilesh\Validation\Enums\Validator;
use Respect\Validation\Validator as v;

class Contacts  extends Actionable
{
    # Actionable Classes
    protected $actionables = [
        'isIndianPhoneNumber' => '_isIndianPhoneNumber',
        'isIndianMobileNo' => '_isIndianMobileNo',
        'isIndianLandlineNo' => 'isIndianLandlineNo'
    ];

    /**
     * Is Indian Phone No. Including Landlines
     */
    function _isIndianPhoneNumber()
    {
        return [
            'validation' => v::regex('#^(?:(?:\+|0{0,2})91(\s*[\- ]\s*)?|[0]?)?[0-9]{10}$#')
        ];
    }

    /**
     * Is Indian Mobile No
     */
    function _isIndianMobileNo()
    {
        return [
            'validation' => v::regex('/^[6-9]\d{9}$/')
        ];
    }

    /**
     * Is Indian Landline No
     */
    function isIndianLandlineNo()
    {
        return [
            'validation' => v::regex('/^0[2-9][0-9]{9}$|^[2-9][0-9]{9}$/')
        ];
    }
}
