<?php

namespace DataStructures\Stack;

use DataStructures\CustomArray\CustomArray;

//栈也是一种线性结构
//相比数组 栈对应的操作是数组的子集
//只能从一端 添加元素 也只能从一端取出元素，这一端称为栈顶
//栈是一种后进先出的数据结构
//Last In First Out(LIFO)
//在计算机世界里 栈拥有者不可思议的作用
//栈的应用
//无处不在的Undo操作（撤销）
//系统调用栈（图片）
/**
 * 使用数组构建一个栈
 * Class ArrayStack
 */
class ArrayStack implements Stack
{
    /** @var CustomArray $array */
    private $array;

    public function __construct(int $capacity = 10)
    {
        $this->array = new CustomArray($capacity);
    }

    //入栈
    public function push($e)
    {
        $this->array->addLast($e);
    }

    //出栈
    public function pop()
    {
        return $this->array->removeLast();
    }

    //查看一眼栈顶的元素
    public function peek()
    {
        return $this->array->getLast();
    }

    public function getSize():int
    {
        return $this->array->getSize();
    }

    public function isEmpty():bool
    {
        return $this->array->isEmpty();
    }

    //测试栈
    public function testCase()
    {
        $res = 'Stack: [';

        for ($i = 0; $i < $this->array->getSize(); $i++) {
            $res .= $this->array->get($i);

            if ($i != $this->array->getSize() - 1) {
                $res .= ',';
            }
        }

        $res .= '] top' . PHP_EOL;

        return $res;
    }
}
