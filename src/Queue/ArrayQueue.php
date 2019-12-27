<?php
namespace DataStructures\Queue;

use DataStructures\CustomArray\CustomArray;

/**
 * 数组队列
 * Class ArrayQueue
 * @package DataStructures\Queue
 */
class ArrayQueue implements Queue
{
    /** @var CustomArray $array */
    private $array;

    public function __construct(int $capacity)
    {
        $this->array = new CustomArray($capacity);
    }

    public function enqueue($e)
    {
       $this->array->addLast($e);
    }

    public function dequeue()
    {
       return $this->array->removeFirst();
    }

    public function getFront()
    {
        return $this->array->getFirst();
    }

    public function getSize(): int
    {
        return $this->array->getSize();
    }

    public function isEmpty(): bool
    {
       return $this->array->isEmpty();
    }

    //测试
    public function testCase()
    {
        $res = 'Queue: front [';

        for ($i = 0; $i < $this->array->getSize(); $i++) {
            $res .= $this->array->get($i);

            if ($i != $this->array->getSize() - 1) {
                $res .= ',';
            }
        }

        $res .= '] tail' . PHP_EOL;

        return $res;
    }
}