<?php

namespace Sandfox\Debug\PrivateAccess\Tests;

use ClassWithPrivateConstant;
use ClassWithPrivateData;
use PHPUnit\Framework\TestCase;

use function SandFox\Debug\call_private_method;
use function SandFox\Debug\get_private_const;
use function SandFox\Debug\get_private_field;
use function SandFox\Debug\set_private_field;

class PrivateAccessTest extends TestCase
{
    public function testGetPrivateField()
    {
        $object = new ClassWithPrivateData();

        $result = get_private_field($object, 'secret');
        $this->assertEquals('SECRET2345', $result);

        $result = get_private_field(
            [$object, 'InnerClassWithPrivateData'],
            'secret'
        );
        $this->assertEquals('INNER_SECRET2345', $result);
    }

    public function testCallPrivateMethodWithArguments()
    {
        $object = new ClassWithPrivateData();

        $result = call_private_method($object, 'doSomethingSecret', 'secret1', 'secret2');
        $this->assertEquals('secret1!secret2', $result);

        $result = call_private_method(
            [$object, 'InnerClassWithPrivateData'],
            'doSomethingSecret',
            'secret1',
            'secret2'
        );
        $this->assertEquals('secret2!secret1', $result);
    }

    public function testCallPrivateMethodWithoutArguments()
    {
        $object = new ClassWithPrivateData();

        $result = call_private_method($object, 'doSomethingElseSecret');
        $this->assertEquals('SECRET2345', $result);

        $result = call_private_method(
            [$object, 'InnerClassWithPrivateData'],
            'doSomethingElseSecret'
        );
        $this->assertEquals('INNER_SECRET2345', $result);
    }

    public function testSetPrivateField()
    {
        $object = new ClassWithPrivateData();

        set_private_field($object, 'secret', 'hahaimhaxxor');
        $result = $object->reveal();
        $this->assertEquals('STATICSECRET123!hahaimhaxxor', $result);

        set_private_field(
            [$object, 'InnerClassWithPrivateData'],
            'secret',
            'hahaimhaxxor'
        );
        $result = $object->innerReveal();
        $this->assertEquals('hahaimhaxxor!INNER_STATICSECRET123', $result);
    }

    public function testGetStaticPrivateField()
    {
        $result = get_private_field('ClassWithPrivateData', 'staticSecret');

        $this->assertEquals('STATICSECRET123', $result);
    }

    public function testSetStaticPrivateField()
    {
        // ok, testing static is a pain
        // first, save the state of the private
        $savedSecret = get_private_field('ClassWithPrivateData', 'staticSecret');

        set_private_field('ClassWithPrivateData', 'staticSecret', 'hahaimhaxxor');

        $object = new ClassWithPrivateData();
        $result = $object->reveal();

        $this->assertEquals('hahaimhaxxor!SECRET2345', $result);

        // return everything as it was
        set_private_field('ClassWithPrivateData', 'staticSecret', $savedSecret);
    }

    public function testCallStaticPrivateMethod()
    {
        $result = call_private_method('ClassWithPrivateData', 'doStaticSecret', '111');

        $this->assertEquals('STATICSECRET123111', $result);
    }

    public function testGetPrivateConstant()
    {
        $result = get_private_const('ClassWithPrivateConstant', 'SECRET_CONST');

        $this->assertEquals('SECRET_CONST_VALUE', $result);
    }

    public function testGetPrivateConstantFromObject()
    {
        $object = new ClassWithPrivateConstant();

        $result = get_private_const($object, 'SECRET_CONST');

        $this->assertEquals('SECRET_CONST_VALUE', $result);
    }
}
