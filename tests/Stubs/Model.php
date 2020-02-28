<?php

namespace WebHappens\ConditionalMethods\Tests\Stubs;

use WebHappens\ConditionalMethods\ConditionalMethods;

class Model
{
    use ConditionalMethods;

    public function toUpper($value)
    {
        return strtoupper($value);
    }
}
