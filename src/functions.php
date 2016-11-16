<?php

namespace SandFoxMe\Debug;

function call_private_method($object, string $method, ...$args)
{
    return (function ($method, ...$args) {
        return call_user_func_array([$this, $method], $args);
    })->call($object, $method, ...$args);
}

function get_private_field($object, string $field)
{
    return (function ($field) {
        return $this->$field;
    })->call($object, $field);
}

function set_private_field($object, string $field, $value)
{
    return (function ($field, $value) {
        $this->$field = $value;
    })->call($object, $field, $value);
}
