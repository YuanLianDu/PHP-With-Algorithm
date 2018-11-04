<?php

namespace Stack;

require_once '../vendor/autoload.php';

/**
 * 测试顺序栈基础方法
 * @return void
 * @date 2018/11/04
 * @author yuanliandu <yuanliandu@qq.com>
 */
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

/**
 * 测试链式栈基础方法
 * @return void
 * @date 2018/11/04
 * @author yuanliandu <yuanliandu@qq.com>
 */
function testLinkedListStack()
{
    $stack = new LinkedListStack();
    for ($i = 1;$i <= 10;$i++) {
        $stack->push($i);
    }
    var_dump($stack);
    for ($i = 0;$i < 5;$i++) {
        print($stack->pop());
    }
    var_dump($stack);
    
    var_dump($stack->length());
    var_dump($stack->getTop());
    var_dump($stack->clear());
    var_dump($stack->isEmpty());
    unset($stack);//php 销毁对象使用unset即可
    var_dump($stack);
}

/**
 * 测试共享栈
 * @return void
 * @date 2018/11/04
 * @author yuanliandu <yuanliandu@qq.com>
 */
function shareTheStack()
{
    $stack = new DoubleStack(6);
    // 测试栈1 ，增加元素
    for($i=1;$i<=3;$i++) {
        $stack->push($i,1);
    }
    var_dump($stack);

    // 测试栈2 ，增加元素
    for($i=6;$i>=4;$i--) {
        $stack->push($i,2);
    }
    var_dump($stack);

    // 测试栈1 ，增加元素，栈满能否还可以增加元素
    $stack->push(4,1);
    // 测试栈2 ，增加元素，边界
    $stack->push(4,2);

    // // 测试栈1 ，弹出元素，及边界问题
    for($i=1;$i<=3;$i++) {
        $stack->pop(1);
    }
    var_dump($stack);
    $stack->pop(1);

    // // 测试栈2 ，弹出元素，及边界问题
    for($i=1;$i<=3;$i++) {
        $stack->pop(2);
    }
    var_dump($stack);
    $stack->pop(2);
    
}

testLinkedListStack();
// shareTheStack();
