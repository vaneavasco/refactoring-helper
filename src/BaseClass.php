<?php
namespace Vaneavasco\Refactor;

abstract class BaseClass
{
    /**
     * Stored methods
     * @var
     */
    private $methods;

    /**
     * Add a new public method
     *
     * @param $methodName
     * @param callable $method
     */
    public function addMethod($methodName, Callable $method)
    {
        $this->methods[$methodName] = $method;
    }

    /**
     * Call baby
     *
     * @param $methodName
     * @param $args
     * @return mixed|null
     */
    public function __call($methodName, $args)
    {
        if (is_callable($this->methods[$methodName])) {
            return call_user_func_array(
                $this->methods[$methodName],
                $args
            );
        }

        return null;
    }
}