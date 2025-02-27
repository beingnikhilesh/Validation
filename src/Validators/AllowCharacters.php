<?php

namespace beingnikhilesh\Validation\Validators;

use Respect\Validation\Validator as v;

class AllowCharacters extends Base
{
    function rule()
    {
        return [
            'regex' => '[!@#$%&~^*()\-_=+\{\}\[\]:;"\\\'<>,.\/?\\\\]',
        ];
    }
}
