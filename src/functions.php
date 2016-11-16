<?php

namespace SandFoxMe\Debug;

function call_private_method($object, $method, ...$args)
{
    $closure = function ($method, ...$args) {
        return call_user_func_array([$this, $method], $args);
    };

    $closure = $closure->bindTo($object, $object);

    return $closure($method, ...$args);
}

function get_private_field($object, $field)
{
    $closure = function ($field) {
        return $this->$field;
    };

    $closure = $closure->bindTo($object, $object);

    return $closure($field);
}

function set_private_field($object, $field, $value)
{
    $closure = function ($field, $value) {
        $this->$field = $value;
    };

    $closure = $closure->bindTo($object, $object);

    return $closure($field, $value);
}
