<?php

use Queue\ListQueue;
use Queue\ArrayQueue;

require_once '../vendor/autoload.php';


// $list = new ListQueue();
// for($i=0;$i<4;$i++) {
//     $list->Enqueue($i+1);
// }
// var_dump($list->GetHead());
// var_dump($list->QueueLength());
// var_dump($list);
// for($i=0;$i<5;$i++) {
//     var_dump($list->Dequeue());
// }
// var_dump($list);

$arr =  new ArrayQueue(5);
for($i=0;$i<5;$i++) {
    $arr->Enqueue($i+1);
}
$arr->DeQueue();
$arr->Enqueue(5);
$arr->DeQueue();
$arr->Enqueue(6);


var_dump($arr->getHead());
var_dump($arr->QueueLength());
var_dump($arr);
$arr->Clear();
var_dump($arr);


