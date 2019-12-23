<?php

namespace DataStructures\MyArray;

/**
 * php模拟一个限制长度的数组，由于php语言本身特性,数组并不限制长度，所以添加一个容量属性capacity限制
 * Class CustomArray
 */
class CustomArray
{
    private $capacity;
    private $arr = [];
    private $size;

    //初始化时传入数组的容量,默认10
    public function __construct($capacity = 10)
    {
        $this->capacity = $capacity;
        $this->size     = 0;
    }

    // 在index索引的位置插入一个新元素e
    public function addElement($index, $e)
    {
        if ($this->capacity == 0) {
            die("Add failed. Array is full.");
        }

        if ($index < 0 || $index > $this->size) {
            die("Add failed. Require index >= 0 and index <= size.");
        }

        //将索引为index至数组的最后的最后一个元素都往后挪一位 从最后一个元素开始
        //如数组元素为 [0 => 10, 1 => 11, 2 => 22]，往索引为1的的元素插入值33  则索引为1和2的元素 都要往后挪一位为 [0=>0, 2=>11,3=>22]
        //然后将index插入至数组[0 => 10, 1 => 33, 2 => 11,3 => 22]
        for ($i = $this->size - 1; $i >= $index; $i--) {
            $this->arr[$i + 1] = $this->arr[$i];
        }

        $this->arr[$index] = $e;

        $this->size++;//长度加一
        $this->capacity--;//容量减一
    }

    // 返回数组是否为空
    public function isEmpty()
    {
        return $this->size == 0;
    }

    //获取数组元素的个数
    public function getSize()
    {
        return $this->size;
    }

    // 获取数组的剩余容量
    public function getCapacity()
    {
        return $this->capacity;
    }

    // 向所有元素后添加一个新元素
    public function addLast($e)
    {
        $this->addElement($this->size, $e);
    }

    //元素e是否存在数组中
    public function contains($e)
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->arr[$i] == $e) {
                return true;
            }
        }

        return false;
    }

    //查找数组中元素e所在的索引，如果不存在元素e，则返回-1
    public function find($e)
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->arr[$i] == $e) {
                return $i;
            }
        }

        return -1;
    }

    // 获取index索引位置的元素
    public function get($index)
    {
        if ($index < 0 || $index >= $this->size) {
            die("Add failed. Require index >= 0 and index <= size.");
        }

        return $this->arr[$index];
    }

    // 修改index索引位置的元素为e
    public function set($index, $e)
    {
        if ($index < 0 || $index >= $this->size) {
            die("Add failed. Require index >= 0 and index <= size.");
        }

        $this->arr[$index] = $e;
    }

    //从数组中删除index位置的元素，返回删除的元素
    public function remove($index)
    {
        if ($index < 0 || $index >= $this->size) {
            die('offset -1  error!');
        }

        $value = $this->arr[$index];

        //$arr = [0,1,2,3,4,5];
        //删除数组中索引为index的元素，操作步骤为  将index之后的元素  依次往前挪一位 从index之后的第一个元素开始
        for ($i = $index + 1; $i < $this->size; $i++) {
            $this->arr[$i - 1] = $this->arr[$i];
        }

        //由于php数组特性，手动模拟 删除被移除的最后一个元素
        unset($this->arr[$this->size - 1]);

        $this->size--;//长度减一
        $this->capacity++;//容量加一

        return $value;
    }

    //从数组中删除第一个元素，返回删除的元素
    public function removeFirst()
    {
        return $this->remove(0);
    }

    //从数组中删除元素e
    public function removeElement($e)
    {
        $index = $this->find($e);

        if ($index != -1) {
            return $this->remove($index);
        }
    }

    //从数组中删除最后一个元素, 返回删除的元素
    public function removeLast()
    {
        return $this->remove($this->size - 1);
    }

    //获取数组的第一个元素
    public function getFirst()
    {
        return $this->get(0);
    }

    //获取数组的第二个元素
    public function getLast()
    {
        return $this->get($this->size - 1);

    }

    //获取数组元素
    public function getData()
    {
        return $this->arr;
    }

    //测试数组
    public function testCase()
    {
        $res = sprintf("Array: size = %d , capacity = %d\n", $this->size, $this->capacity);
        $res .= '[';

        for ($i = 0; $i < $this->size; $i++) {
            $res .= $this->arr[$i];

            if ($i != $this->size - 1) {
                $res .= ',';
            }
        }

        $res .= ']' . PHP_EOL;

        return $res;
    }
}