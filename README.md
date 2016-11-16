# PHP Private Access

A small simple library to access private properties of the objects

## Usage

These two simple functions can come in handy as helpers for something like [PsySH](http://psysh.org/)

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

This library is for the debug with PHP consoles like PsySH. If you actually using it in some
live system, you're doing something terribly wrong.

## License

MIT, see LICENSE.md
