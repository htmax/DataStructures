<?php

use DataStructures\LinkedList\LinkedList;

require __DIR__ . '../../vendor/autoload.php';


$linkedList = new LinkedList();
for ($i = 0; $i < 5; $i++) {
    $linkedList->addFirst($i);
    print_r($linkedList->testCase());
}

var_dump($linkedList->contains(0));
$linkedList->add(2,666);
var_dump($linkedList->testCase());
var_dump($linkedList->get(2));
$linkedList->removeElement(666);
var_dump($linkedList->removeFirst());
var_dump($linkedList->testCase());