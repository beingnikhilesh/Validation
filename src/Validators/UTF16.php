<?php

namespace beingnikhilesh\Validation\Validators;

use Respect\Validation\Validator as v;

class UTF16 extends Base
{
    public function rule()
    {
        return [
            'regex' => '[\p{Devanagari}\p{Bengali}\p{Gurmukhi}\p{Gujarati}\p{Oriya}\p{Tamil}\p{Telugu}\p{Malayalam}\p{Sinhala}\p{Kannada}]',
        ];
    }
}
