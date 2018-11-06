<?php
namespace Queue;

abstract class Queue {
    
    // abstract public function init();  construct

    // abstract public function Destroy(); unset

    abstract public function Clear();

    abstract public function GetHead();

    abstract public function EnQueue();

    abstract public function DeQueue();

    abstract public function QueueLength();


}