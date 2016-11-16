# PHP Private Access


[![Packagist](https://img.shields.io/packagist/v/sandfoxme/private-access.svg?maxAge=2592000)](https://packagist.org/packages/sandfoxme/private-access)
[![Packagist](https://img.shields.io/packagist/l/sandfoxme/private-access.svg?maxAge=2592000)](https://opensource.org/licenses/MIT)
[![Travis](https://img.shields.io/travis/sandfoxme/php-private-access.svg?maxAge=2592000)](https://travis-ci.org/sandfoxme/php-private-access)
[![Code Climate](https://img.shields.io/codeclimate/github/sandfoxme/php-private-access.svg?maxAge=2592000)](https://codeclimate.com/github/sandfoxme/php-private-access)

A small simple library to access private properties of the objects

## Usage

These three simple functions can come in handy as helpers for something like [PsySH](http://psysh.org/)

```php
<?php

use function SandFoxMe\Debug\get_private_field;
use function SandFoxMe\Debug\set_private_field;
use function SandFoxMe\Debug\call_private_method;

get_private_field($a, 'secret'); // get $a->secret value
set_private_field($a, 'secret', 'new secret'); // set new $a->secret value
call_private_method($a, 'doStuff', 'whatever'); // call $a->doStuff('whatever')
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

This library is for debugging with PHP consoles like PsySH. If you actually using it in some
live system, you're doing something terribly wrong.

## License

MIT, see LICENSE.md
