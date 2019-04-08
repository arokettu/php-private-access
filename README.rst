PHP Private Access
##################

.. image::  https://img.shields.io/packagist/v/sandfoxme/private-access.svg?maxAge=2592000
   :alt:    Packagist
   :target: https://packagist.org/packages/sandfoxme/private-access
.. image::  https://img.shields.io/github/license/sandfoxme/php-private-access.svg?maxAge=2592000
   :alt:    License
   :target: https://opensource.org/licenses/MIT
.. image::  https://img.shields.io/travis/sandfoxme/php-private-access.svg?maxAge=2592000
   :alt:    Travis
   :target: https://travis-ci.org/sandfoxme/php-private-access

A small simple library to access private properties of the objects.
Actually it's more an example of mad skillz than a useful tool.
No Reflection API calls!

Usage
=====

These four simple functions can come in handy as helpers for something like PsySH_

.. code-block:: php

    <?php

    use function SandFox\Debug\get_private_field;
    use function SandFox\Debug\set_private_field;
    use function SandFox\Debug\call_private_method;
    use function SandFox\Debug\get_private_const;

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

Installation
============

Add the following to your composer.json:

.. code-block:: json

    {
        "require-dev": {
            "sandfoxme/private-access": "*"
        }
    }

or run::

    composer require sandfoxme/private-access --dev

Why ``"require-dev"``?
----------------------

This library may be used for debugging or with PHP consoles like PsySH.
If you are actually using it in some live system, you're doing something terribly wrong.

License
=======

MIT, see LICENSE.md

.. _PsySH: https://psysh.org/
