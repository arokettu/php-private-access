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
     * @param $arg1
     * @param $arg2
     * @return string
     * @internal param $whatever
     */
    private function doSomethingSecret($arg1, $arg2)
    {
        return $arg1 . '!' . $arg2;
    }

    /**
     * private method for testing - no arguments
     *
     * @return string
     */
    private function doSomethingElseSecret()
    {
        return $this->secret;
    }

    /**
     * some public method to avoid IDE warnings
     *
     * @return string
     */
    public function reveal()
    {
        return $this->doSomethingSecret($this->secret, $this->doSomethingElseSecret());
    }
}
