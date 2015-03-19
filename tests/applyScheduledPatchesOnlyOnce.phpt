--TEST--
Apply scheduled patches once

--FILE--
<?php

error_reporting(E_ALL | E_STRICT);

require __DIR__ . "/../Patchwork.php";

$callNumber = 0;
Patchwork\replace("NamedObject::getName", function () use (&$callNumber) {
    $callNumber++;
});

require __DIR__ . "/includes/TestUtils.php";// just for many many injects triggered
require __DIR__ . "/includes/NamedObject.php";
require __DIR__ . "/includes/Functions.php.php";// just for many many injects triggered

$obj= new NamedObject('');
$obj->getName();

assert($callNumber === 1, "\$callNumber was $callNumber");

?>
===DONE===

--EXPECT--
===DONE===