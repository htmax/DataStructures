<?php

use DataStructures\Queue\LoopQueue;

require __DIR__ . '../../vendor/autoload.php';

$loopQueue = new LoopQueue(10);

for ($i = 0; $i < 10; $i++) {
    $loopQueue->enqueue($i);
    print_r($loopQueue->testCase());

    if ($i % 3 == 2) {
        echo 'Dequeue: ' . $loopQueue->dequeue() . PHP_EOL;
        print_r($loopQueue->testCase());

    }
}
echo 'Dequeue: ' . $loopQueue->dequeue() . PHP_EOL;
echo 'Dequeue: ' . $loopQueue->dequeue() . PHP_EOL;
echo 'Dequeue: ' . $loopQueue->dequeue() . PHP_EOL;

$loopQueue->enqueue(111);
$loopQueue->enqueue(222);

print_r($loopQueue->getData());
