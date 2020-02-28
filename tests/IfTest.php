<?php

namespace WebHappens\ConditionalMethods\Tests;

use WebHappens\ConditionalMethods\Tests\Stubs\Model;

class IfTest extends TestCase
{
    /** @test */
    public function if_returns_from_closure_when_condition_is_true()
    {
        $model = new Model;

        $response = $model->if(true, function () {
            return 'foo';
        });

        $this->assertEquals('foo', $response);
    }

    /** @test */
    public function if_returns_this_instance_when_condition_is_false()
    {
        $model = new Model;

        $this->assertSame($model, $model->if(false, function () {}));
    }

    /** @test */
    public function magic_if_forwards_method_call_with_arguments_when_condition_is_true()
    {
        $model = new Model;

        $this->assertEquals('FOO', $model->toUpperIf(true, 'foo'));
    }

    /** @test */
    public function magic_if_returns_this_instance_when_condition_is_false()
    {
        $model = new Model;

        $this->assertSame($model, $model->toUpperIf(false));
    }
}
