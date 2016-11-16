<?php

require_once 'ClassWithPrivateData.php';

class PrivateAccessTest extends PHPUnit_Framework_TestCase
{
    public function testGetPrivateField()
    {
        $object = new ClassWithPrivateData();

        $result = \SandFoxMe\Debug\get_private_field($object, 'secret');

        $this->assertEquals('SECRET2345', $result);
    }

    public function testCallPrivateMethod()
    {
        $object = new ClassWithPrivateData();

        $result = \SandFoxMe\Debug\call_private_method($object, 'doSomethingSecret', 'secret1', 'secret2');

        $this->assertEquals('secret1!secret2', $result);
    }

    public function testSetPrivateField()
    {
        $object = new ClassWithPrivateData();

        \SandFoxMe\Debug\set_private_field($object, 'secret', 'hahaimhaxxor');

        $result = $object->reveal();

        $this->assertEquals('hahaimhaxxor!hahaimhaxxor', $result);
    }
}
