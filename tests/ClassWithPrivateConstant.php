<?php

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
