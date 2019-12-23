<?php
namespace DataStructures\Stack;

interface Stack
{
    //入栈
    public function push($e);
    //出栈
    public function pop();
    //查看一下栈顶的元素
    public function peek();
    public function getSize();
    public function isEmpty();
}