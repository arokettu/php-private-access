<?php

/**
 * @copyright 2016 Anton Smirnov
 * @license MIT https://spdx.org/licenses/MIT.html
 */

/**
 * Test PHP 7.1 feature, private constants
 */
class ClassWithPrivateConstant
{
    private const SECRET_CONST = 'SECRET_CONST_VALUE';

    public static function revealConst()
    {
        return self::SECRET_CONST;
    }
}
