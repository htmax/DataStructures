<?php

class ListNode
{
    public $val  = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

class Solution
{
    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function removeElements($head, $val)
    {
//        if ($head == null) {
//            return null;
//        }
//        //递归的方式处理
//        $head->next = $this->removeElements($head->next, $val);
//
//        return $head->val == $val ? $head->next : $head;

        //虚拟头节点的好处
        $dummyHead       = new ListNode(-1);
        $dummyHead->next = $head;

        $prev = $dummyHead;

        while ($prev->next != null) {
            if ($prev->next->val == $val) {
                $prev->next = $prev->next->next;
            } else {
                $prev = $prev->next;
            }
        }

        return $dummyHead->next;
    }
}