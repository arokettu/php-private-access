# PHP Private Access


[![Packagist](https://img.shields.io/packagist/v/sandfoxme/private-access.svg?maxAge=2592000)](https://packagist.org/packages/sandfoxme/private-access)
[![Packagist](https://img.shields.io/github/license/sandfoxme/php-private-access.svg?maxAge=2592000)](https://opensource.org/licenses/MIT)
[![Travis](https://img.shields.io/travis/sandfoxme/php-private-access.svg?maxAge=2592000)](https://travis-ci.org/sandfoxme/php-private-access)

A small simple library to access private properties of the objects.
Actually it's more an example of mad skillz than a useful tool.
No Reflection API calls!

## Usage

These four simple functions can come in handy as helpers for something like [PsySH](http://psysh.org/)

```php
<?php

use function SandFoxMe\Debug\get_private_field;
use function SandFoxMe\Debug\set_private_field;
use function SandFoxMe\Debug\call_private_method;
use function SandFoxMe\Debug\get_private_const;

get_private_field($a, 'secret'); // get $a->secret value
set_private_field($a, 'secret', 'new secret'); // set new $a->secret value
call_private_method($a, 'doStuff', 'whatever'); // call $a->doStuff('whatever')

// Use class name to do static!

get_private_field(A::class, 'secret'); // get A::$secret value
set_private_field(A::class, 'secret', 'new secret'); // set new A::$secret value
call_private_method(A::class, 'doStuff', 'whatever'); // call A::doStuff('whatever')

// In PHP 7.1 you can also access private constants

get_private_const($a, 'SECRET_CONST');
// or
get_private_const(A::class, 'SECRET_CONST');
```

## Installation

Add the following to your composer.json:

```json
{
    "require-dev": {
        "sandfoxme/private-access": "*"
    }
}
```

### Why ``"require-dev"``?

This library may be used for debugging or with PHP consoles like PsySH. If you are actually using it in some
live system, you're doing something terribly wrong.

## License

MIT, see LICENSE.md
