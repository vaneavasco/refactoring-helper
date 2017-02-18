<?php
include '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

require_once 'OldClutteredClass.php';
require_once 'NewShinyClass.php';
require_once 'NewInterface.php';

$methodPlucker = new Vaneavasco\Refactor\MethodPlucker(true);
$interfaceHelper = new Vaneavasco\Refactor\InterfaceHelper();

$interfaceMethodsList = $interfaceHelper->getMethods(NewInterface::class);

$sourceObject = new OldClutteredClass('My secret private property.');
$destinationObject = new NewShinyClass();

$methodPlucker->pluckMethods($interfaceMethodsList, $sourceObject, $destinationObject);

foreach ($interfaceMethodsList as $interfaceMethod) {
    $result = call_user_func_array([$destinationObject, $interfaceMethod], []);

    echo $result . "\n";
}