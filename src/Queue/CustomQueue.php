<?php

namespace DataStructures\Queue;
/**
 * 用php内置函数解决队列 十分简单
 * Class CustomQueue
 * @package DataStructures\Queue
 */
class CustomQueue implements Queue
{
    private $data = [];

    public function enqueue($e)
    {
        array_push($this->data, $e);
    }

    public function dequeue()
    {
        return array_shift($this->data);
    }

    public function getFront()
    {
        return reset($this->data);
    }

    public function getSize(): int
    {
        return count($this->data);
    }

    public function isEmpty(): bool
    {
        return empty($this->data);
    }
}