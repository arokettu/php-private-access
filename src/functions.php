<?php

/**
 * A tool to access private fields and classes of PHP objects
 *
 * @author      Anton Smirnov <sandfox@sandfox.me>
 * @copyright   Copyright (c) 2016 Anton Smirnov
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace SandFoxMe\Debug;

function call_private_method($object, $method)
{
    $args = func_get_args();
    array_shift($args); // $object
    array_shift($args); // $method

    $closure = function ($method, $args) use ($object) {
        return call_user_func_array([$object, $method], $args);
    };

    // if $object is not an object, assume it's a class name
    if (is_object($object)) {
        $closure = $closure->bindTo($object, $object);
    } else {
        $closure = $closure->bindTo(null, $object);
    }

    return $closure($method, $args);
}

function get_private_field($object, $field)
{
    // if $object is not an object, assume it's a class name
    if (is_object($object)) {
        $closure = function ($field) {
            return $this->$field;
        };
        $closure = $closure->bindTo($object, $object);
    } else {
        $closure = function ($field) {
            return self::$$field;
        };
        $closure = $closure->bindTo(null, strval($object));
    }

    return $closure($field);
}

function set_private_field($object, $field, $value)
{
    // if $object is not an object, assume it's a class name
    if (is_object($object)) {
        $closure = function ($field, $value) {
            $this->$field = $value;
        };
        $closure = $closure->bindTo($object, $object);
    } else {
        $closure = function ($field, $value) {
            self::$$field = $value;
        };
        $closure = $closure->bindTo(null, strval($object));
    }

    return $closure($field, $value);
}
