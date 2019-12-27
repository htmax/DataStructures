<?php

use DataStructures\Queue\ArrayQueue;
use DataStructures\Queue\LinkedListQueue;
use DataStructures\Queue\LoopQueue;

require __DIR__ . '../../vendor/autoload.php';
//数组队列
$startTime  = microtime(true);
$arrayQueue = new ArrayQueue(50000);
for ($i = 0; $i < 50000; $i++) {
    $random = rand(0, 100000);
    $arrayQueue->enqueue($random);
}

for ($i = 0; $i < 50000; $i++) {
    $arrayQueue->dequeue();
}
$endTime = microtime(true);
echo 'Array Queue: ' . $endTime - $startTime . PHP_EOL; //34s

//循环队列
$startTime = microtime(true);
$loopQueue = new LoopQueue(50000);
for ($i = 0; $i < 50000; $i++) {
    $random = rand(0, 100000);
    $loopQueue->enqueue($random);
}

for ($i = 0; $i < 50000; $i++) {
    $loopQueue->dequeue();
}
$endTime = microtime(true);
echo 'Loop Queue: ' . $endTime - $startTime . PHP_EOL;//0.02s

//链表队列
$startTime = microtime(true);
$loopQueue = new LinkedListQueue();
for ($i = 0; $i < 50000; $i++) {
    $random = rand(0, 100000);
    $loopQueue->enqueue($random);
}

for ($i = 0; $i < 50000; $i++) {
    $loopQueue->dequeue();
}
$endTime = microtime(true);
echo 'LinkedList Queue: ' . $endTime - $startTime . PHP_EOL;//0.015s