<?php

namespace beingnikhilesh\Validation\Validators;

use Respect\Validation\Validator as v;

class NoSpaces extends Base
{
    public function rule()
    {
        return [
            'regex' =>  '\S',
        ];
    }
}
