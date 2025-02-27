<?php

namespace beingnikhilesh\Validation\Actionables;

use beingnikhilesh\error\Error;
use beingnikhilesh\Validation\Enums\Validator;
use Respect\Validation\Validator as v;

class Actionable
{
    # Throw Errors?
    private $throwErrors = TRUE;
    # Error Message Templates
    protected $errorTemplates = [
        'standard' => 'The Value Passed for {name} is Invalid.',
        'noValue' => 'Invalid or Missing Value provided for {name}',
        'mandatory' => 'No Value passed for the field {name}. It\'s Mandatory',
    ];

    public function __construct($params = [])
    {
        # If there is no Input, Return
        if (empty(func_get_args()))
            return;

        # If Mute Errors is Set
        if (in_array(Validator::muteErrors, func_get_args()))
            $this->throwErrors = FALSE;
    }

    /**
     * Function to recieve anonymous Calls, get the Basic Validation, add the Extra Validations and return the Response
     * @param   string  $name       Name of the Field (Function)
     * @param   array   $params     Additional Parameters for Validation
     *                                  $params[1] - $value - Value to Validate
     *                                  $params[2] - $variableName - Name of the Field to throw Error
     *                                  $params[3] - $enums - * Enums for Additional Validation
     *                                  $params[4] - $additionalParams - * Additional Parameters required for Validation
     * 
     * @return  bool                Is the data Valid or Invalid i.e. TRUE / FALSE
     */
    function __call($fnname, $params = [])
    {
        ### Load, Declare the Required Libraries, Classes, Variables
        $parser = service('parser');
        # Regex Flags
        $regexFlags = '';
        # Holds the Additional Enum Validations
        $validations = [];
        # Assign inputs Parameters to Variables for better Usage
        @list($value, $variableName, $enums, $additionalParams) = $params;

        # Check if a Basic Validation Function Exists
        if (!in_array($fnname, array_keys($this->actionables)))
            return trigger_error("Fatal error: Method " . $fnname . " not Found", E_USER_ERROR);

        # Call the Base Validator Class. Additionally, Pass the Parameters if $params[3] i.e. $additionalParams has them
        $validation = $this->{$this->actionables[$fnname]}((!empty($additionalParams) ? $additionalParams : ''));

        # Convert the Enum Inputs to Array
        $enums = !is_array($enums) ? [$enums] : $enums;

        if (in_array(Validator::AllowNull, $enums)) {
            if (empty($value))
                return TRUE;

            # Remove Validator::AllowNull from the Enum Params List
            unset($enums[array_search(Validator::AllowNull, $enums)]);
        }

        # Check if Unicode Validation is Passed
        if (in_array(Validator::UTF16, $enums)) {
            unset($enums[array_search(Validator::UTF16, $enums)]);
            $regexFlags .= 'u';
        }
        
        # If there are some Validatiors in Regex, Regex Validation is available and some set of Validators are allowed
        if (!empty($params[2]) && isset($validation['regex']) && !empty($validation['allowedValidators'])) {
            # Add the First Validator from basic Function
            $validations[] = $validation['regex'];
            # Loop through the validators and add them to the validations array
            foreach ($enums as $key => $val) {
                if ($val != Validator::AllowNull && is_a($val, Validator::class) && in_array($val, $validation['allowedValidators'])) {
                    $validations[] = (new ($val->value)())->rule()['regex'];
                }
            }

            # Combine all validation regex
            $validationRegex = implode('|', $validations);
            $regexFlags = (!empty($validation['flags'])) ? $regexFlags . $validation['flags'] : $regexFlags;
            $validator = v::regex('/^(' . $validationRegex . ')+$/' . count_chars($regexFlags, 3));
        } else {
            # Default validation if conditions are not met
            $validator = $validation['validation'];
        }

        # Check if is the Value provided is Valid as per the Validation, return FALSE if not valid
        if (!$validator->validate($value)) {
            # Throw Errors if asked
            if ($this->throwErrors) {
                # Get the Error message
                $errorMessage = $this->errorTemplates[@$this->errorMap[$fnname] ?? 'standard'];
                # Parse and Set the Error message and return FALSE
                Error::set_error($parser->setData(['name' => $variableName])->renderString($errorMessage));
            }

            return FALSE;
        }

        # The Validation is correct
        return TRUE;
    }
}
