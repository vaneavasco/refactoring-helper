<?php
require_once 'NewInterface.php';

class NewShinyClass extends \Vaneavasco\Refactor\BaseClass implements NewInterface
{
    public function publicMethodB()
    {
        return $this->__call(__FUNCTION__, func_get_args());
    }

    public function publicMethodC()
    {
        return $this->__call(__FUNCTION__, func_get_args());
    }

}