<?php

namespace beingnikhilesh\Validation\Validators;

use Respect\Validation\Rules\AbstractComposite;
use Respect\Validation\Validatable;
use Respect\Validation\Validator As vl;

class AllOff extends AbstractComposite
{

    public function __construct(...$params)
    {
        $this->checkAndAddRule($params);
    }

    public function checkAndAddRule($params)
    {   
        if (is_array($params))
            foreach ($params as $index => $rule) {
                if (is_array($rule))
                    $this->checkAndAddRule($rule);
                else {
                    if (is_a($rule, \Respect\Validation\Validatable::class))
                        $this->addRule($rule);
                }
            }
    }

    public function validate($input): bool
    {
        foreach ($this->getRules() as $rule) {
            if (!$rule->validate($input)) {
                return false;
            }
        }

        return true;
    }
}
