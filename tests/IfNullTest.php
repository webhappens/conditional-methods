<?php

namespace WebHappens\ConditionalMethods\Tests;

use WebHappens\ConditionalMethods\Tests\Stubs\Model;

class IfNullTest extends TestCase
{
    use NotNullValues;

    /** @test */
    public function ifnull_returns_from_closure_when_condition_is_null()
    {
        $model = new Model;

        $response = $model->ifNull(null, function () {
            return 'foo';
        });

        $this->assertEquals('foo', $response);
    }

    /** @test */
    public function ifnull_returns_this_instance_when_condition_is_not_null()
    {
        $model = new Model;

        foreach ($this->getNotNullValues() as $notNullValue) {
            $this->assertSame($model, $model->ifNull($notNullValue, function () {}));
        }
    }

    /** @test */
    public function magic_ifnull_forwards_method_call_with_arguments_when_condition_is_null()
    {
        $model = new Model;

        $this->assertEquals('FOO', $model->toUpperIfNull(null, 'foo'));
    }

    /** @test */
    public function magic_ifnull_returns_this_instance_when_condition_is_not_null()
    {
        $model = new Model;

        foreach ($this->getNotNullValues() as $notNullValue) {
            $this->assertSame($model, $model->toUpperIfNull($notNullValue));
        }
    }
}
