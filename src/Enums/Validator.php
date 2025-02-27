<?php

namespace beingnikhilesh\Validation\Enums;

use beingnikhilesh\Validation\Validators\Alphanumeric;
use beingnikhilesh\Validation\Validators\AllowNULL;
use beingnikhilesh\Validation\Validators\Withspace;
use beingnikhilesh\Validation\Validators\AllowCharacters;
use beingnikhilesh\Validation\Validators\NoSpaces;
use beingnikhilesh\Validation\Validators\Ipv6;
use beingnikhilesh\Validation\Validators\UTF16;

enum Validator: string
{
    # Throw Errors
    case muteErrors = '0';
    # All other Validators
    case NoSpaces =  NoSpaces::class;
    case UTF16 = UTF16::class;
    case Alphanumeric = Alphanumeric::class;
    case AllowNull = AllowNULL::class;
    case Withspace =  Withspace::class;
    case AllowCharacters = AllowCharacters::class;
    case Ipv6  = Ipv6::class;
}
