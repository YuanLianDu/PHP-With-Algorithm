<?php
namespace Stack;

abstract class Stack {
    
// abstract public function init(int $maxSize);

// abstract public function destroy();
abstract public function clear();
abstract public function isEmpty();
abstract public function getTop();
abstract public function push($item);
abstract public function pop();
abstract public function length();


}