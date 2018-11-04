<?php

namespace Stack;

require_once '../vendor/autoload.php';

function testArrayStack()
{
    $maxSize = 10;
    $arrayStack = new ArrayStack($maxSize);
    for ($i = 0;$i < 10;$i++) {
        $arrayStack->push($i);
    }
    for ($i = 0;$i < 5;$i++) {
        print($arrayStack->pop());
    }
    var_dump($arrayStack->length());
    var_dump($arrayStack->getTop());
    var_dump($arrayStack->clear());
    var_dump($arrayStack->isEmpty());
    unset($arrayStack);//php 销毁对象使用unset即可
    var_dump($arrayStack);
}

function testLinkedListStack() {
    $stack = new LinkedListStack();
    for ($i = 1;$i<=10;$i++) {
        $stack->push($i);
    }
    for ($i = 0;$i < 5;$i++) {
        print($stack->pop());
    }
    var_dump($stack->length());
    var_dump($stack->getTop());
    var_dump($stack->clear());
    var_dump($stack->isEmpty());
    unset($stack);//php 销毁对象使用unset即可
    var_dump($stack);
}
testLinkedListStack();

