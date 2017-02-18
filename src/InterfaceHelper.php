<?php
namespace Vaneavasco\Refactor;


class InterfaceHelper
{
    /**
     * @param string $interfaceName
     * @return array
     */
    public function getMethods($interfaceName)
    {
        $returnMethods = [];
        $reflectedClass = new \ReflectionClass($interfaceName);
        $reflectedMethods = $reflectedClass->getMethods();

        foreach ($reflectedMethods as $reflectedMethod) {
            $returnMethods[] = $reflectedMethod->name;
        }

        return $returnMethods;
    }
}