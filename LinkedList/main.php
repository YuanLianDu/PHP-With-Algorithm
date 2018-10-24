<?php
namespace LinkedList;

require_once '../vendor/autoload.php';



function lru() {
    $LRU = new LruCache();
    $LRU->getData(1);
    $LRU->getData(2);
    $LRU->getData(3);
    $LRU->getData(4);
    var_dump($LRU->getData(2));
}

lru();


