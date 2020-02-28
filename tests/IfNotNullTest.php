<?php

namespace WebHappens\ConditionalMethods\Tests;

use WebHappens\ConditionalMethods\Tests\Stubs\Model;

class IfNotNullTest extends TestCase
{
    use NotNullValues;

    /** @test */
    public function ifnotnull_returns_from_closure_when_condition_is_not_null()
    {
        $model = new Model;

        foreach ($this->getNotNullValues() as $notNullValue) {
            $response = $model->ifNotNull($notNullValue, function () {
                return 'foo';
            });

            $this->assertEquals('foo', $response);
        }
    }

    /** @test */
    public function ifnotnull_returns_this_instance_when_condition_is_null()
    {
        $model = new Model;

        $this->assertSame($model, $model->ifNotNull(null, function () {}));
    }

    /** @test */
    public function magic_ifnotnull_forwards_method_call_with_arguments_when_condition_is_not_null()
    {
        $model = new Model;

        foreach ($this->getNotNullValues() as $notNullValue) {
            $this->assertEquals('FOO', $model->toUpperIfNotNull($notNullValue, 'foo'));
        }
    }

    /** @test */
    public function magic_ifnotnull_returns_this_instance_when_condition_is_null()
    {
        $model = new Model;

        $this->assertSame($model, $model->toUpperIfNotNull(null));
    }
}
