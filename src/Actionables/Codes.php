<?php

namespace beingnikhilesh\Validation\Actionables;

use Respect\Validation\Validator as v;

class Codes  extends Actionable
{
    # Actionable Classes
    protected $actionables = [
        'isIndianPinCode' => '_isIndianPinCode',
        'isIndianPostalCode' => '_isIndianPincode',
        'isCountryCode' => '_isCountryCode',
        'isCurrencycode' => '_isCurrencycode',
        'isLanguageCode' => '_isLanguageCode',
    ];

    /** Validate Indian Pincode */
    function _isIndianPinCode() {
        return [
            'validation' => v::regex('/^([1-9][0-9]{5})+$/'),
            'regex' => '[1-9][0-9]{5}',
        ];
    }

    /**
     * Validate Countrycodes ISO 3166-1 - https://wikipedia.org/wiki/ISO_3166-1
     */
    function isCountryCode()
    {
        return [
            'validation' => v::countryCode(),
        ];
    }

    /**
     * validate Currency Code - ISO 4217 - http://en.wikipedia.org/wiki/ISO_4217
     */
    function _isCurrencycode()
    {
        return [
            'validation' => v::currencyCode(),
        ];
    }

    /**
     * Validate Language Code - ISO 639 - https://en.wikipedia.org/wiki/List_of_ISO_639_language_codes
     */
    function _isLanguageCode()
    {
        return [
            'validation' => v::regex('/^[A-Z]{5}$/'),
        ];
    }
}
