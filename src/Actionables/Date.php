<?php

namespace beingnikhilesh\Validation\Actionables;

/**
 *  Class to provide function relating to FormatDate Validations
 *  v0.0.1 
 * 
 */

use Respect\Validation\Validator as v;

class Date extends Actionable
{
    private $dateFormat = 'Y-m-d';
    private $datetimeFormat = 'Y-m-d H:i:s';

    # Actionable Classes
    protected $actionables = [
        'isDate' => '_isDate',
        'isDateTime' => '_isDateTime',
        'isFutureDate' => '_isFutureDate',
        'isPastDate' => '_isPastDate',
        'isLeapDate' => '_isLeapDate',
        'isLeapYear' => '_isLeapYear',
        'isTime' => '_isTime',
    ];

    public function setDateFormat(string $dateFormat = '')
    {
        if (!empty($dateFormat))
            $this->dateFormat = $dateFormat;

        return $this;
    }

    /**
     * Validates Date Format ( E.g. 'Y-m-d')
     */
    public function _isDate()
    {
        return [
            'validation' => v::date($this->dateFormat),
        ];
    }

    /**
     *  Validates Datetime Format (E.g 'Y-m-d H:i:s')
     */
    public function _isDateTime()
    {
        return [
            'validation' => v::datetime($this->datetimeFormat),
        ];
    }

    /**
     *  Validates if the Date Provided is a past Date (<= today)
     */
    public function _isPastDate()
    {
        return [
            'validation' => v::date($this->dateFormat)->max(date($this->dateFormat)),
        ];
    }

    /**
     *  validate if the Date provided is a future Date (>= today)
     */
    public function _isFutureDate()
    {
        return [
            'validation' => v::date($this->dateFormat)->min(date('Y-m-d')),
        ];
    }

    /**
     *  Validates if the Provided Date is a LeapDate
     */
    public function _isLeapDate()
    {
        return [
            'validation' => v::leapDate($this->dateFormat),
        ];
    }

    /**
     *  validate  LeapYear
     */
    public function _isLeapYear()
    {

        return [
            'validation' => v::leapYear(),
        ];
    }

    /**
     *  validate Time 
     */
    public function _isTime()
    {

        return [
            'validation' => v::time(),
        ];
    }

    /** 
     * Check if From and to Dates are Correct i.e. To Date > From Date 
     * */
    public function _validateFromToDate(string $fromDate, string $toDate)
    {
        // Convert the dates to the desired format (if needed)
        $fromDateFormatted = date($this->dateFormat, strtotime($fromDate));
        $toDateFormatted = date($this->dateFormat, strtotime($toDate));

        if ($fromDateFormatted > $toDateFormatted) {
            return [
                'validation' => false,
                'message' => 'The "to" date must be greater than or equal to the "from" date.',
            ];
        }

        return [
            'validation' => true,
        ];
    }
}
