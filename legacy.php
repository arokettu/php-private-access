<?php

namespace SandFoxMe\Debug;

/**
 * @inheritDoc
 * @deprecated \SandFox\Debug\call_private_method
 */
function call_private_method($object, $method)
{
    return call_user_func_array('SandFox\Debug\call_private_method', func_get_args());
}

/**
 * @inheritDoc
 * @deprecated \SandFox\Debug\get_private_field
 */
function get_private_field($object, $field)
{
    return call_user_func_array('SandFox\Debug\get_private_field', func_get_args());
}

/**
 * @inheritDoc
 * @deprecated \SandFox\Debug\set_private_field
 */
function set_private_field($object, $field, $value)
{
    call_user_func_array('SandFox\Debug\set_private_field', func_get_args());
}

/**
 * @inheritDoc
 * @deprecated \SandFox\Debug\get_private_const
 */
function get_private_const($object, $const)
{
    return call_user_func_array('SandFox\Debug\get_private_const', func_get_args());
}
