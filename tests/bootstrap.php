<?php

require_once __DIR__ . '/classes/ClassWithPrivateData.php';

if (PHP_VERSION_ID >= 70100) {
    // check PHP 7.1 feature
    require_once __DIR__ . '/classes/ClassWithPrivateConstant.php';
} else {
    // emulate
    class_alias('ClassWithPrivateData', 'ClassWithPrivateConstant');
}
