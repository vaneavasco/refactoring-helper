<?php
namespace Vaneavasco\Refactor;

class MethodPlucker
{
    /** @var  bool */
    protected $overwriteExistingMethods;

    /**
     * MethodPlucker constructor.
     * @param bool $overwriteExistingMethods
     */
    public function __construct($overwriteExistingMethods = true)
    {
        $this->overwriteExistingMethods = $overwriteExistingMethods;
    }

    /**
     * @param array $methodsToPluck
     * @param $sourceObject
     * @param BaseClass $destinationObject
     */
    public function pluckMethods(array $methodsToPluck, $sourceObject, BaseClass $destinationObject)
    {
        if (!is_object($sourceObject)) {
            throw new \InvalidArgumentException('$sourceObject must be an object!');
        }

        foreach ($methodsToPluck as $methodIndex => $methodToPluck) {
            $reflectedMethod = new \ReflectionMethod($sourceObject, $methodToPluck);
            if ($this->overwriteExistingMethods) {
                $this->muteMethod($destinationObject, $methodToPluck);
            }

            $destinationObject->addMethod($methodToPluck, $reflectedMethod->getClosure($sourceObject));
        }
    }

    /**
     * @param bool $overwriteExistingMethods
     */
    public function setOverwriteExistingMethods($overwriteExistingMethods)
    {
        $this->overwriteExistingMethods = $overwriteExistingMethods;
    }

    /**
     * Making sure the __call method is called by making any eventual method inaccessible
     *
     * @param BaseClass $destinationObject
     * @param $methodToPluck
     */
    protected function muteMethod(BaseClass $destinationObject, $methodToPluck)
    {
        $method = new \ReflectionMethod($destinationObject, $methodToPluck);
        $method->setAccessible(false);
    }

}