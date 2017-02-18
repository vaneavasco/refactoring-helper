<?php

class OldClutteredClass
{
    private $somePrivateProperty;

    public function __construct($val)
    {
        $this->somePrivateProperty = $val;
    }

    public function publicMethodA()
    {
        return __FUNCTION__ . $this->somePrivateProperty;
    }

    public function publicMethodB()
    {
        return __FUNCTION__ . $this->somePrivateProperty;
    }

    public function publicMethodC()
    {
        return __FUNCTION__ . $this->somePrivateProperty;
    }
}