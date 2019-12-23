<?php
use DataStructures\MyArray\CustomArray;

require __DIR__ . '../../vendor/autoload.php';

/*——————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————*/
//测试数组

$customArray = new CustomArray();

for ($i = 0; $i < 10; $i++) {
    $customArray->addLast($i);
    print_r($customArray->testCase());
}

$customArray->remove(6);
$customArray->set(3, 444);
echo 'set: ' . $customArray->get(3) . PHP_EOL;
echo "capacity: {$customArray->getCapacity()}" . PHP_EOL;
echo "size: {$customArray->getSize()}" . PHP_EOL;

$arr = $customArray->getData();
print_r($arr);