# PHP Private Access

[![Packagist](https://img.shields.io/packagist/v/sandfoxme/private-access.svg?style=flat-square)](https://packagist.org/packages/sandfoxme/private-access)
[![License](https://img.shields.io/packagist/l/sandfoxme/private-access.svg?style=flat-square)](https://opensource.org/licenses/MIT)
[![Gitlab pipeline status](https://img.shields.io/gitlab/pipeline/sandfox/php-private-access.svg/master.svg?style=flat-square)](https://gitlab.com/sandfox/php-private-access/-/pipelines)

A small simple library to access private properties of the objects.
Actually it's more an example of mad skillz than a useful tool.
No Reflection API calls!

## Installation

Use composer:

    composer require sandfoxme/private-access --dev

## Usage

These four simple functions can come in handy as helpers for something like [PsySH]

* `get_private_field()`
* `set_private_field()`
* `call_private_method()`
* `get_private_const()`

Read full documentation here: <https://sandfox.dev/php/private-access.html>

## License

The library is available as open source under the terms of the [MIT License].

[PsySH]: https://psysh.org/
[MIT License]: https://opensource.org/licenses/MIT
