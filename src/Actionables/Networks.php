<?php

namespace beingnikhilesh\Validation\Actionables;


/**
 *  Class to provide function relating to Networks Validations
 *  v0.0.1 
 * 
 */

use beingnikhilesh\Validation\Enums\Validator;
use Respect\Validation\Validator as v;

class Networks  extends Actionable
{
    # Actionable Classes
    protected $actionables = [
        'isEmail' => '_isEmail',
        'isIPAddress' => '_isIPAddress',
        'isIPV6Address' => 'isIPV6Address',
        'isURL' => '_isURL',
        'isMACAddress' => '_isMACAddress',

    ];

    /**
     * Validate Email ID
     */
    function _isEmail()
    {
        return [
            'validation' => v::email(),
        ];
    }

    /**
     * Is IP Address
     */
    function _isIPAddress()
    {
        return [
            'validation' => v::ip(),
        ];
    }

    /**
     * Is IP Address
     */
    function _isIPV6Address() {}

    /**
     * Validate MAC Address
     */
    function _isMACAddress()
    {
        return [
            'validation' => v::macAddress(),
        ];
    }

    /** 
     * Validate URL
     */
    function _isURL()
    {
        return [
            'validation' => v::url(),
        ];
    }
}
