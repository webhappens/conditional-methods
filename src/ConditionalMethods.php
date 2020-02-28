<?php

namespace WebHappens\ConditionalMethods;

use Closure;
use WebHappens\ConditionalMethods\Str;

trait ConditionalMethods
{
    public function if($condition, Closure $callback)
    {
        return $condition ? $callback($this) : $this;
    }

    public function unless($condition, Closure $callback)
    {
        return $this->if( ! $condition, $callback);
    }

    public function ifNull($value, Closure $callback)
    {
        return is_null($value) ? $callback($this) : $this;
    }

    public function ifNotNull($value, Closure $callback)
    {
        return ! is_null($value) ? $callback($this) : $this;
    }

    protected function callConditionalMethod($type, $method, $arguments)
    {
        $value = array_shift($arguments);
        $method = str_replace($type, '', $method);
        $callback = function () use ($method, $arguments) {
            return $this->{$method}(...$arguments);
        };

        return $this->{lcfirst($type)}($value, $callback);
    }

    protected static function matchConditionalMethod($method)
    {
        foreach(['If', 'Unless', 'IfNull', 'IfNotNull'] as $condition) {
            if (Str::endsWith($method, $condition)) {
                return $condition;
            }
        }
    }
}
