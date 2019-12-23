<?php
use DataStructures\Stack\ArrayStack;

require __DIR__ . '../../vendor/autoload.php';

$arrayStack = new ArrayStack(10);

for ($i = 0; $i < 5; $i++) {
    $arrayStack->push($i);
    print_r($arrayStack->testCase());
}

$arrayStack->pop();
print_r($arrayStack->testCase());