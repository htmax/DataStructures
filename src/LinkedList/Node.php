<?php

namespace DataStructures\LinkedList;

class Node
{
    public $e;
    /** @var Node $next */
    public $next = null;

    public function __construct($e, $next = null)
    {
        $this->e    = $e;
        $this->next = $next;
    }
}