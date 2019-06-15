<?php

namespace DataStructure;

use App\MyArray\CustomArray;
use App\Stack\ArrayStack;

require_once 'vendor/autoload.php';

/*——————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————*/
//测试数组

$obj = new CustomArray();

for($i = 0 ; $i < 10 ; $i ++) {
    $obj->addLast($i);
    print_r($obj->testCase());
}

$obj->remove(6);
$obj->set(3,444);
echo 'set: ' . $obj->get(3) . PHP_EOL;
echo "capacity: {$obj->getCapacity()}" . PHP_EOL;
echo "size: {$obj->getSize()}" . PHP_EOL;

$arr = $obj->getData();
print_r($arr);

/*——————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————*/
//测试栈
$obj = new ArrayStack(10);

for ($i = 0; $i < 5; $i++) {
    $obj->push($i);
    print_r($obj->testCase());
}

$obj->pop();
print_r($obj->testCase());

/*———————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————*/
//测试队列





