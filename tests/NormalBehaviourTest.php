<?php

namespace WebHappens\ConditionalMethods\Tests;

use BadMethodCallException;
use WebHappens\ConditionalMethods\Tests\Stubs\Model;

class NormalBehaviourTest extends TestCase
{
    /** @test */
    public function normal_methods_work()
    {
        $model = new Model;

        $this->assertEquals('FOO', $model->toUpper('foo'));
    }

    /** @test */
    public function missing_methods_throw_bad_method_call_exception()
    {
        $this->expectException(BadMethodCallException::class);

        (new Model)->methodThatDoesNotExist();
    }
}
