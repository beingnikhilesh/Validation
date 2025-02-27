<?php

namespace beingnikhilesh\Validation\Actionables;

/**
 *  Class to provide function relating to Strings Validations
 *  v0.0.1 
 * 
 */

use beingnikhilesh\Validation\Enums\Validator;
use Respect\Validation\Validator as v;

class Banking extends Actionable
{
    # Actionable Classes
    protected $actionables = [
        'isCreditCardNo' => '_isCreditCardNo',
        'isUIDNo' => '_isUID',
        'isAadharCardNo' => '_isUID',
        'isIndianPassportNo' => '_isIndianPassportNo',
        'isIndianVoterIDNo' => '_isIndianVoterIDNo',
        'isIndianDrivingLicenseNo' => '_isIndianDrivingLicenseNo',
        'isOtherID' => '_isOtherID',
        'isPANNo' => '_isPANNo',
    ];

    /**
     * Validate UID i.e. Indian Aadhar No. Number
     */
    function _isUID()
    {
        return [
            'validation' => v::regex('/^\d{12}$/'),
            'regex' => '\d{12}',
            'allowedValidators' => [
                Validator::Withspace,
            ]
        ];
    }

    /**
     * Validate PAN Card No.
     */
    function _isPANNo()
    {
        return [
            'validation' => v::regex('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/'),
        ];
    }

    /**
     * Validate Indian Passport No.
     */
    function _isIndianPassportNo()
    {
        return [
            'validation' => v::regex('/^[A-Z][0-9]{7}$/'),
        ];
    }

    /**
     * Validate Indian Voter ID (EPIC) No.
     */
    function _isIndianVoterIDNo()
    {
        return [
            'validation' => v::regex('/^[A-Z]{3}[0-9]{7}$/'),
        ];
    }

    /**
     * Validate Indian Voter ID (EPIC) No.
     */
    function _isIndianDrivingLicenseNo()
    {
        return [
            'validation' => v::regex('/^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$/'),
        ];
    }

    /**
     * Validate Indian Voter ID (EPIC) No.
     */
    function _isOtherID()
    {
        return [
            'validation' => v::regex('/^[\w\s\-]{1,20}$/'),
        ];
    }

    /**
     * Validate Creditcard Numbers
     */
    function _isCreditCardNo()
    {
        return [
            'validation' => v::CreditCard(),
        ];
    }
}
