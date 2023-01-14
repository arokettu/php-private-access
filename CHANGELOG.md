# Changelog

## 3.x

### 3.0.0

*Jan 14, 2023*

* The package was renamed to arokettu/private-access
* The namespace now is `Arokettu\Debug`

## 2.x

### 2.0.0

*Jan 30, 2021*

* Allow access to private stuff from parent classes
* Require PHP 5.6
* Legacy namespace `SandFoxMe\Debug` was removed

## 1.x

### 1.3.0

*Apr 9, 2019*

* Change base namespace to SandFox

### 1.2.0

*May 29, 2018*

* new `get_private_const` implementation without reflection
* PHP 5.4.6 is now required due to possible `constant()` misbehavior

### 1.1.0

*Dec 7, 2016*

- functions now can access static fields and methods
- added `get_private_const` to reflect php 7.1 changes

### 1.0.0

*Nov 17, 2016*

Initial release
