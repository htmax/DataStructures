<?php

use DataStructures\Queue\LinkedListQueue;

require __DIR__ . '../../vendor/autoload.php';

$arrayStack = new LinkedListQueue(10);

for ($i = 0; $i < 10; $i++) {
    $arrayStack->enqueue($i);
    print_r($arrayStack->testCase());

    if ($i % 3 == 2) {
        echo 'Dequeue: ' . $arrayStack->dequeue() . PHP_EOL;
        print_r($arrayStack->testCase());
    }
}
var_dump($arrayStack->getSize());
var_dump($arrayStack->isEmpty());
$arrayStack->dequeue();