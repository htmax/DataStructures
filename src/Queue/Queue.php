<?php
namespace DataStructures\Queue;

interface Queue
{
    public function enqueue($e);
    public function dequeue();
    public function getFront();
    public function getSize(): int;
    public function isEmpty(): bool;
}