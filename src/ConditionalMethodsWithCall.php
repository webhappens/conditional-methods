<?php

namespace WebHappens\ConditionalMethods;

use BadMethodCallException;

trait ConditionalMethodsWithCall
{
    use ConditionalMethods;

    public function __call($method, $arguments)
    {
        if ($type = static::matchConditionalMethod($method)) {
            return $this->callConditionalMethod($type, $method, $arguments);
        }

        throw new BadMethodCallException(sprintf(
            'Call to undefined method %s::%s()',
            static::class,
            $method
        ));
    }
}
