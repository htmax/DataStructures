<?php

namespace DataStructures\LinkedList;

class LinkedList
{
    /** @var Node $dummyHead */
    private $dummyHead;
    private $size = 0;

    public function __construct()
    {
        $this->dummyHead = new Node(null, null);
        $this->size      = 0;
    }

    // 获取链表中的元素个数
    public function getSize(): int
    {
        return $this->size;
    }

    // 返回链表是否为空
    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    // 在链表的index(0-based)位置添加新的元素e
    // 在链表中不是一个常用的操作，练习用：）
    public function add(int $index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw new \Exception("Add failed. Illegal index.");
        }

        $prev = $this->dummyHead;
        //找到要插入的节点前一个节点
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

//        $node       = new Node($e);
//        $prev->next = $node->next;
//        $prev->next = $node;

        $prev->next = new Node($e, $prev->next);
        //对象默认 引用传递！！！ 之前以为修改prev的值不会修改dummyHead的值 这里学习到了新知识
        //     $this->dummyHead = $prev;

        $this->size++;
    }

    // 在链表头添加新的元素e
    public function addFirst($e)
    {
        //不插入虚拟头结点的情况
//        $node       = new Node($e);
//        $node->next = $this->head;
//        $this->head = $node;
//        $this->head = new Node($e, $this->head);
//        $this->size++;

        $this->add(0, $e);
    }

    // 在链表末尾添加新的元素e
    public function addLast($e)
    {
        $this->add($this->size, $e);
    }

    // 获得链表的第index(0-based)个位置的元素
    // 在链表中不是一个常用的操作，练习用：）
    public function get(int $index)
    {
        if ($index < 0 || $index > $this->size) {
            throw new \Exception("Get failed. Illegal index.");
        }

        $current = $this->dummyHead->next;

        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }

        return $current->e;
    }

    public function getFirst()
    {
        return $this->get(0);
    }

    public function getLast()
    {
        return $this->get($this->size - 1);
    }

    // 修改链表的第index(0-based)个位置的元素为e
    // 在链表中不是一个常用的操作，练习用：）
    public function set(int $index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw new \Exception("Set failed. Illegal index.");
        }

        $current = $this->dummyHead->next;

        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }

        $current->e = $e;
    }

    // 查找链表中是否有元素e
    public function contains($e)
    {
        $current = $this->dummyHead->next;

        while ($current->next != null) {
            if ($current->e === $e) {
                return true;
            }

            $current = $current->next;
        }

        //循环结束条件是$current->next == null但是此时$current->next是null但是已经跳出循环了，$current->e并没有比对
        return $current->e === $e;
    }

    public function remove(int $index)
    {
        if ($index < 0 || $index > $this->size) {
            throw new \Exception("Remove failed. Index is illegal.");
        }

        $prev = $this->dummyHead;
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

        $delNode       = $prev->next;
        $prev->next    = $delNode->next;
        $delNode->next = null;
        $this->size--;

        return $delNode->e;

    }

    // 从链表中删除第一个元素, 返回删除的元素
    public function removeFirst()
    {
        return $this->remove(0);
    }

    // 从链表中删除最后一个元素, 返回删除的元素
    public function removeLast()
    {
        return $this->remove($this->size - 1);
    }

    // 从链表中删除元素e
    public function removeElement($e)
    {
        $prev = $this->dummyHead;

        while ($prev->next != null) {
            if ($prev->next->e === $e) {
                break;
            }

            $prev = $prev->next;
        }

        if ($prev->next != null) {
            $delNode       = $prev->next;
            $prev->next    = $delNode->next;
            $delNode->next = null;
            $this->size--;
        }
    }

    public function testCase()
    {
        $current = $this->dummyHead->next;

        $res = '';
        while ($current->next != null) {
            $res     .= $current->e . '->';
            $current = $current->next;
        }

        //循环结束条件是$current->next == null但是此时$current->e不是null 所以需要再输出一个$current->e
        $res .= "{$current->e}->NULL" . PHP_EOL;

        return $res;
    }

}