Private Access
##############

|Packagist| |GitLab| |GitHub| |Bitbucket| |Gitea|

A small simple library to access private properties of the objects.
Actually it's more an example of mad skillz than a useful tool.
No Reflection API calls!

Installation
============

Use composer:

.. code-block:: bash

    composer require sandfoxme/private-access --dev

Why ``--dev``?
--------------

This library may be used for debugging or with PHP consoles like PsySH.
If you are actually using it in some live system, you're doing something terribly wrong.

Functions
=========

These four simple functions can come in handy as helpers for something like PsySH_

.. note:: All functions also work with protected and public visibilities

``get_private_field``
---------------------

Get value of a private field

.. code-block:: php

    <?php

    use function SandFox\Debug\get_private_field;

    get_private_field($a,       'secret'); // get $a->secret value
    get_private_field(A::class, 'secret'); // get A::$secret value

``set_private_field``
---------------------

Set value of a private field

.. code-block:: php

    <?php

    use function SandFox\Debug\set_private_field;

    set_private_field($a,       'secret', 'new secret'); // set new $a->secret value
    set_private_field(A::class, 'secret', 'new secret'); // set new A::$secret value

``call_private_method``
-----------------------

Call private method

.. code-block:: php

    <?php

    use function SandFox\Debug\call_private_method;

    call_private_method($a,       'doStuff', 'whatever'); // call $a->doStuff('whatever')
    call_private_method(A::class, 'doStuff', 'whatever'); // call A::doStuff('whatever')

``get_private_const``
---------------------

Get value of a private constant

.. note::
    This function works in all supported PHP versions but is useful only with PHP 7.1+
    where constants can be private or protected

.. code-block:: php

    <?php

    use function SandFox\Debug\get_private_const;

    get_private_const($a,       'SECRET_CONST');
    // or
    get_private_const(A::class, 'SECRET_CONST');


License
=======

The library is available as open source under the terms of the `MIT License`_.

.. _PsySH:          https://psysh.org/
.. _MIT License:    https://opensource.org/licenses/MIT

.. |Packagist|  image:: https://img.shields.io/packagist/v/sandfoxme/private-access.svg?style=flat-square
   :target:     https://packagist.org/packages/sandfoxme/private-access
.. |GitHub|     image:: https://img.shields.io/badge/get%20on-GitHub-informational.svg?style=flat-square&logo=github
   :target:     https://github.com/arokettu/php-private-access
.. |GitLab|     image:: https://img.shields.io/badge/get%20on-GitLab-informational.svg?style=flat-square&logo=gitlab
   :target:     https://gitlab.com/sandfox/php-private-access
.. |Bitbucket|  image:: https://img.shields.io/badge/get%20on-Bitbucket-informational.svg?style=flat-square&logo=bitbucket
   :target:     https://bitbucket.org/sandfox/php-private-access
.. |Gitea|      image:: https://img.shields.io/badge/get%20on-Gitea-informational.svg?style=flat-square&logo=gitea
   :target:     https://sandfox.org/sandfox/php-private-access
