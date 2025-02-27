<?php

namespace beingnikhilesh\Validation\Validators;

class AllowNULL extends Base
{

    public function rule()
    {

        return [
            'regex' => '$|^.*',
        ];
    }
}
