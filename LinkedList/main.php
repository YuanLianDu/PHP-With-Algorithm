<?php

namespace LinkedList;

require_once '../vendor/autoload.php';

/**
 * lru 调用
 * @return void
 * @date 2018/10/24
 * @author yuanliandu <yuanliandu@qq.com>
 */
function lru()
{
    $LRU = new LruCache();
    $LRU->getData(1);
    $LRU->getData(2);
    $LRU->getData(3);
    $LRU->getData(4);
    var_dump($LRU->getData(2));
}

/**
 * 判断是否是回文字符串
 * 将链表整个反转，循环比较
 * 时间复杂度O(n),空间复杂度O(1)
 * @param string $str
 *
 * @return bool
 * @date 2018/10/25
 * @author yuanliandu <yuanliandu@qq.com>
 */
function isPalindromeByReserve(string $str)
{
    /**
     * 将字符串，用链表存储
     */
    $arr = str_split($str);
    $strList = (new SingleLinkedList())->createListTail($arr); //初始化O(n)
    $reverseStrList = $strList->reverse();//翻转链表O(n)

    /**
     * 循环比较是否是回文
     */
    if($strList->isSame($reverseStrList)) {
        print('the string is palindrome');

    }else {
        print('the string is not palindrome');
    }
   

}

/**
 * 比较是否是回文
 * 找到中间节点(通过慢指针、快指针) 反转右半部分，然后与链表相比判断是否是回文
 * @param string $str
 *
 * @return bool
 * @date 2018/10/25
 * @author yuanliandu <yuanliandu@qq.com>
 */
function isPalindrome(string $str)
{
     /**
     * 将字符串，用链表存储
     */
    $arr = str_split($str);
    $strList = (new SingleLinkedList())->createListTail($arr); //初始化O(n)

    $middle = $strList->findMiddle();
    $middleSigngleList = new SingleLinkedList();
    $middleSigngleList->next = $middle;
    $reverseRight = $middleSigngleList->reverse();

    /**
     * 循环比较是否是回文
     */
    if($strList->isSame($reverseRight)) {
        print('the string is palindrome');

    }else {
        print('the string is not palindrome');
    }
    
}

// lru();
isPalindrome('abccb');
