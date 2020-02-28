<?php

namespace WebHappens\ConditionalMethods\Tests;

trait NotNullValues
{
    protected function getNotNullValues()
    {
        return [false, true, 0, 1, '', 'foo', [], ['foo'], (object) [], 123, -123, 1.23, -1.23];
    }
}
