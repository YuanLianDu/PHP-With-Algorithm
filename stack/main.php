<?php
namespace Stack;

require_once '../vendor/autoload.php';


$arrayStack = new ArrayStack();
$arrayStack->init(10);
for($i=0;$i<10;$i++) {
    $arrayStack->push($i);
}
for($i=0;$i<5;$i++) {
    print($arrayStack->pop());
}
var_dump($arrayStack->length());
var_dump($arrayStack->getTop());
var_dump($arrayStack->clear());
var_dump($arrayStack->isEmpty());
unset($arrayStack);//php 销毁对象使用unset即可
var_dump($arrayStack);