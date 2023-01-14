<?php

/**
 * A tool to access private fields and classes of PHP objects
 *
 * @author      Anton Smirnov <sandfox@sandfox.me>
 * @copyright   Copyright (c) 2016 Anton Smirnov
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Arokettu\Debug;

/**
 * @param object|string|array $object Object or class name or [object, className]
 * @param string $method
 * @param mixed ...$args
 * @return mixed
 */
function call_private_method($object, $method, ...$args)
{
    if (is_array($object)) {
        list($object, $className) = $object;
    } else {
        $className = $object;
    }

    // if $object is not an object, assume it's a class name
    if (is_object($object)) {
        $closure = function ($method, $args) {
            return $this->$method(...$args);
        };
        $closure = $closure->bindTo($object, $className);
    } else {
        $closure = function ($method, $args) {
            return self::$method(...$args);
        };
        $closure = $closure->bindTo(null, $className);
    }

    return $closure($method, $args);
}

/**
 * @param object|string|array $object Object or class name or [object, className]
 * @param string $field
 * @return mixed
 */
function get_private_field($object, $field)
{
    if (is_array($object)) {
        list($object, $className) = $object;
    } else {
        $className = $object;
    }

    // if $object is not an object, assume it's a class name
    if (is_object($object)) {
        $closure = function ($field) {
            return $this->$field;
        };
        $closure = $closure->bindTo($object, $className);
    } else {
        $closure = function ($field) {
            return self::$$field;
        };
        $closure = $closure->bindTo(null, $className);
    }

    return $closure($field);
}

/**
 * @param object|string|array $object Object or class name or [object, className]
 * @param string $field
 * @param mixed $value
 * @return void
 */
function set_private_field($object, $field, $value)
{
    if (is_array($object)) {
        list($object, $className) = $object;
    } else {
        $className = $object;
    }

    // if $object is not an object, assume it's a class name
    if (is_object($object)) {
        $closure = function ($field, $value) {
            $this->$field = $value;
        };
        $closure = $closure->bindTo($object, $className);
    } else {
        $closure = function ($field, $value) {
            self::$$field = $value;
        };
        $closure = $closure->bindTo(null, $className);
    }

    $closure($field, $value);
}

/**
 * @param object|string $object
 * @param string $const
 * @return mixed
 */
function get_private_const($object, $const)
{
    $closure = function ($const) {
        return constant('self::' . $const);
    };

    $closure = $closure->bindTo(null, $object);

    return $closure($const);
}
