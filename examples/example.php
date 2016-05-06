<?php
include '../src/AddMethods.php';
include 'Foo.php';
$fooMap = include 'foomap.php';

$foo = new Foo;
$foo->addMethods($fooMap);
$foo->addMethod('method1', function() {
    return 'method1 ' . $this->bar();
});

echo $foo->method1() . PHP_EOL;
echo "sum: " . $foo->sum(1, 2, 3) . PHP_EOL;
$foo->say('hello world!');
