<?php

class ClassWithPrivateData
{
    /**
     * @var string private field for testing
     */
    private $secret = 'SECRET2345';

    /**
     * private method for testing
     *
     * @param $whatever
     * @return string
     */
    private function doSomethingSecret($arg1, $arg2)
    {
        return $arg1 . '!' . $arg2;
    }

    /**
     * some public method to avoid IDE warnings
     *
     * @return string
     */
    public function reveal()
    {
        return $this->doSomethingSecret($this->secret, $this->secret);
    }
}
