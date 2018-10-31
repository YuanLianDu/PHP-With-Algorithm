<?php

namespace stack;

abstract class Stack {
    
abstract public function init();

abstract public function destroy();
abstract public function clear();
abstract public function isEmpty();
abstract public function getTop();
abstract public function push();
abstract public function pop();
abstract public function length();


}