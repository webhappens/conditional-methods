<?php

namespace WebHappens\ConditionalMethods\Tests;

use WebHappens\ConditionalMethods\Tests\Stubs\Model;

class UnlessTest extends TestCase
{
    /** @test */
    public function unless_returns_from_closure_when_condition_is_false()
    {
        $model = new Model;

        $response = $model->unless(false, function () {
            return 'foo';
        });

        $this->assertEquals('foo', $response);
    }

    /** @test */
    public function unless_returns_this_instance_when_condition_is_true()
    {
        $model = new Model;

        $this->assertSame($model, $model->unless(true, function () {}));
    }

    /** @test */
    public function magic_unless_forwards_method_call_with_arguments_when_condition_is_false()
    {
        $model = new Model;

        $this->assertEquals('FOO', $model->toUpperUnless(false, 'foo'));
    }

    /** @test */
    public function magic_unless_returns_this_instance_when_condition_is_true()
    {
        $model = new Model;

        $this->assertSame($model, $model->toUpperUnless(true));
    }
}
