<?php

namespace DataStructures\Stack;

use DataStructures\LinkedList\LinkedList;

/**
 * 链表栈
 * Class LinkedListStack
 * @package DataStructures\Stack
 */
class LinkedListStack implements Stack
{
    private $list;

    public function __construct()
    {
        $this->list = new LinkedList();
    }

    public function push($e)
    {
        $this->list->addFirst($e);
    }

    public function pop()
    {
        return $this->list->removeFirst();
    }

    public function peek()
    {
        return $this->list->getFirst();
    }

    public function getSize(): int
    {
        return $this->list->getSize();
    }

    public function isEmpty(): bool
    {
        return $this->list->isEmpty();
    }

    public function testCase()
    {
        $res = 'Stack: [';

        for ($i = 0; $i < $this->list->getSize(); $i++) {
            $res .= $this->list->get($i);

            if ($i != $this->list->getSize() - 1) {
                $res .= ',';
            }
        }

        $res .= '] top' . PHP_EOL;

        return $res;
    }
}