<?php

namespace DataStructures\Queue;

/**
 * 循环队列(垃圾代码 无意义)
 * Class LoopQueue
 * @package DataStructures\Queue
 */
class LoopQueue implements Queue
{
    private $arr   = [];
    private $front = 0;//头部
    private $tail  = 0;//尾部
    private $size  = 0;
    //php数组可变长度 此类中模拟数组扩容无意义(建议使用其它语言测试这个功能,这里只做学习用途) 故此添加一个capacity模拟数组的容量
    private $capacity = 0;

    public function __construct(int $capacity)
    {
        //循环队列需要有意识的浪费一个空间 因为front 和tail 相等代表队列为空 所以要加1个空间
        $this->capacity = $capacity + 1;
    }

    public function getCapacity()
    {
        return $this->capacity - 1; //实际容量需要-1
    }

    public function getLength()
    {
        return count($this->arr);
    }

    public function enqueue($e)
    {
        if (($this->tail + 1) % $this->getCapacity() == $this->front) {
            $this->resize($this->getCapacity() * 2);
        }

        $this->arr[$this->tail] = $e;
        $this->size++;
        $this->tail = ($this->tail + 1) % $this->getCapacity();
    }

    private function resize(int $newCapacity)
    {
        $this->capacity = $newCapacity + 1;

        $newArr = [];

        for ($i = 0; $i < $this->size; $i++) {
            $newArr[] = $this->arr[($i + $this->front) % $this->getLength()];
        }

        $this->arr   = $newArr;
        $this->front = 0;
        $this->tail  = $this->size;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \Exception('Cannot dequeue from empty queue.');
        }

        $data                    = $this->arr[$this->front];
        $this->arr[$this->front] = null;
        $this->front             = ($this->front + 1) % $this->getLength();
        $this->size--;

        if ($this->size == ($this->getCapacity() / 4) && $this->getCapacity() / 2 != 0) {
            $this->resize($this->getCapacity() / 2);
        }

        return $data;
    }

    public function getFront()
    {
        if ($this->isEmpty()) {
            throw new \Exception('Queue is empty.');
        }

        return $this->arr[$this->front];
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function isEmpty(): bool
    {
        return $this->front == $this->tail;
    }

    //获取数组元素
    public function getData()
    {
        return $this->arr;
    }

    //测试
    public function testCase()
    {
        $res = sprintf("Queue: size = %d , capacity = %d\n", $this->size, $this->getCapacity());
        $res .= 'front [';

        for ($i = 0; $i < $this->size; $i++) {
            $data = $this->arr[($i + $this->front) % $this->getLength()];
            if ($data !== null) {
                $res .= "{$data},";
            }
        }

        $res = rtrim($res, ',');
        $res .= '] tail' . PHP_EOL;

        return $res;
    }
}