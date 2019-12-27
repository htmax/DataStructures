<?php

namespace DataStructures\Queue;


use DataStructures\LinkedList\Node;

/**
 * 链表队列
 * Class ArrayQueue
 * @package DataStructures\Queue
 */
class LinkedListQueue implements Queue
{
    /** @var Node $head */
    private $head = null;
    /** @var Node $head */
    private $tail = null;
    private $size = 0;

    public function enqueue($e)
    {
        if ($this->tail == null) {
            $this->tail = new Node($e);
            $this->head = $this->tail;
        } else {
            $this->tail->next = new Node($e);
            $this->tail       = $this->tail->next;
        }

        $this->size++;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \Exception("Cannot dequeue from an empty queue.");
        }

        $retNode       = $this->head;
        $this->head    = $this->head->next;
        $retNode->next = null;

        if ($this->head == null) {
            $this->tail = null;
        }

        $this->size--;

        return $retNode->e;
    }

    public function getFront()
    {
        if ($this->isEmpty()) {
            throw new \Exception("Queue is empty.");
        }

        return $this->head->e;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    //测试
    public function testCase()
    {
        $current = $this->head;

        $res = 'Queue: front  ';
        while ($current->next != null) {
            $res     .= $current->e . '->';
            $current = $current->next;
        }

        //循环结束条件是$current->next == null但是此时$current->e不是null 所以需要再输出一个$current->e
        $res .= "{$current->e}->NULL  tail" . PHP_EOL;

        return $res;
    }
}