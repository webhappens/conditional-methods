<?php

namespace WebHappens\ConditionalMethods\Tests;

use BadMethodCallException;
use WebHappens\ConditionalMethods\Tests\Stubs\Model;

class WithCallTest extends TestCase
{
    /** @test */
    public function missing_methods_throw_bad_method_call_exception()
    {
        $this->expectException(BadMethodCallException::class);

        (new Model)->methodThatDoesNotExist();
    }
}
