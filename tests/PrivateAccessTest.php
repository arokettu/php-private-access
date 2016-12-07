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

    public function testCallPrivateMethodWithArguments()
    {
        $object = new ClassWithPrivateData();

        $result = \SandFoxMe\Debug\call_private_method($object, 'doSomethingSecret', 'secret1', 'secret2');

        $this->assertEquals('secret1!secret2', $result);
    }

    public function testCallPrivateMethodWithoutArguments()
    {
        $object = new ClassWithPrivateData();

        $result = \SandFoxMe\Debug\call_private_method($object, 'doSomethingElseSecret');

        $this->assertEquals('SECRET2345', $result);
    }

    public function testSetPrivateField()
    {
        $object = new ClassWithPrivateData();

        \SandFoxMe\Debug\set_private_field($object, 'secret', 'hahaimhaxxor');

        $result = $object->reveal();

        $this->assertEquals('STATICSECRET123!hahaimhaxxor', $result);
    }

    public function testGetStaticPrivateField()
    {
        $result = \SandFoxMe\Debug\get_private_field('ClassWithPrivateData', 'staticSecret');

        $this->assertEquals('STATICSECRET123', $result);
    }

    public function testSetStaticPrivateField()
    {
        // ok, testing static is a pain
        // first, save the state of the private
        $savedSecret = \SandFoxMe\Debug\get_private_field('ClassWithPrivateData', 'staticSecret');

        \SandFoxMe\Debug\set_private_field('ClassWithPrivateData', 'staticSecret', 'hahaimhaxxor');

        $object = new ClassWithPrivateData();
        $result = $object->reveal();

        $this->assertEquals('hahaimhaxxor!SECRET2345', $result);

        // return everything as it was
        \SandFoxMe\Debug\set_private_field('ClassWithPrivateData', 'staticSecret', $savedSecret);
    }

    public function testCallStaticPrivateMethod()
    {
        $result = \SandFoxMe\Debug\call_private_method('ClassWithPrivateData', 'doStaticSecret', '111');

        $this->assertEquals('STATICSECRET123111', $result);
    }
}
