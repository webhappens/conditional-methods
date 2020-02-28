<?php

namespace WebHappens\ConditionalMethods\Tests\Stubs;

use WebHappens\ConditionalMethods\ConditionalMethodsWithCall;

class Model
{
    use ConditionalMethodsWithCall;

    public function toUpper($value)
    {
        return strtoupper($value);
    }
}
