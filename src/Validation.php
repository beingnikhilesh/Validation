<?php

namespace beingnikhilesh\Validation;

use beingnikhilesh\Validation\Actionables\Actionable;


class Validation
{
    /** Actionable Objects */
    protected $availableActionables = [
        'String'        => Actionables\Strings::class,
        'Numbers'       => Actionables\Numbers::class,
        'Networks'      => Actionables\Networks::class,
        'Contacts'      => Actionables\Contacts::class,
        'Date'          => Actionables\Date::class,
        'Codes'         => Actionables\Codes::class,
        'Type'          => Actionables\Type::class
    ];

    /** 
     * Magic Function to recive Anynomous Calls and return the Instance of the Actionable Class 
     * */
    public static function __callStatic($name, $arguments)
    {
        return (new self)->createActionable($name, $arguments);
    }

    /**
     *  Function to return the Validation Class
     */
    private function createActionable($name, ?array $arguments = [])
    {
        if (in_array($name, array_keys($this->availableActionables))) {
            $class =  $this->availableActionables[$name];
            return new $class(...$arguments);
        }

        trigger_error("Fatal error: Method " . $name . " not Found", E_USER_ERROR);
    }
}
