# PHP Private Access

[![Packagist](https://img.shields.io/packagist/v/arokettu/private-access.svg?style=flat-square)](https://packagist.org/packages/arokettu/private-access)
[![License](https://img.shields.io/packagist/l/arokettu/private-access.svg?style=flat-square)](https://opensource.org/licenses/MIT)
[![Gitlab pipeline status](https://img.shields.io/gitlab/pipeline/sandfox/php-private-access/master.svg?style=flat-square)](https://gitlab.com/sandfox/php-private-access/-/pipelines)

A small simple library to access private properties of the objects.
Actually it's more an example of mad skillz than a useful tool.
No Reflection API calls!

## Installation

Use composer:

    composer require arokettu/private-access --dev

## Usage

These four simple functions can come in handy as helpers for something like [PsySH]

* `get_private_field()`
* `set_private_field()`
* `call_private_method()`
* `get_private_const()`

## Documentation

Read full documentation here: <https://sandfox.dev/php/private-access.html>

Also on Read the Docs: <https://php-private-access.readthedocs.io/>

## Support

Please file issues on our main repo at GitLab: <https://gitlab.com/sandfox/php-private-access/-/issues>

## License

The library is available as open source under the terms of the [MIT License].

[PsySH]: https://psysh.org/
[MIT License]: https://opensource.org/licenses/MIT
