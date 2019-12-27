<?php
use DataStructures\Stack\LinkedListStack;

require __DIR__ . '../../vendor/autoload.php';

$arrayStack = new LinkedListStack(10);

for ($i = 0; $i < 5; $i++) {
    $arrayStack->push($i);
    print_r($arrayStack->testCase());
}
var_dump($arrayStack->getSize());
var_dump($arrayStack->isEmpty());
$arrayStack->pop();
print_r($arrayStack->testCase());