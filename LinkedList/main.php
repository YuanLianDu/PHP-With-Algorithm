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

/**
 * 检车链表中是否有环
 * @param LinkedList $list
 *
 * @return void
 * @date 2018/10/25
 * @author yuanliandu <yuanliandu@qq.com>
 */
function checkIsHaveCircle(LinkedList $list) {
    $slow = $list->next;
    $fast = $list->next;
    while($fast&& $fast->next) {
        $slow = $slow->next;
        $fast =  $fast->next->next;
        if($slow == $fast) {
            return true;
        }
    }
    return false;
}

/**
 * 创建带环的链表
 * @param array $data
 * @param int $circleHead
 *
 * @return void
 * @date 2018/10/25
 * @author yuanliandu <yuanliandu@qq.com>
 */
function createLiknedListWithCircle(array $data,int $circleHead) {

    $linkedList = new LinkedList();
    $head = $linkedList;
    for($i=1;$i<$circleHead;$i++) {
        $newNode = new LNode($data[$i-1]);
        $head->next = $newNode;
        $head = $newNode;
        unset($data[$i-1]);
    }
    $temp = $head;

    foreach ($data as $key => $value) {
        $newNode = new LNode($value);
        $head->next = $newNode;
        $head = $newNode;
    }
    $head->next = $temp;
    return $linkedList;
}   

function  mergeOrderList() {

}
// lru();//链表实现lru

//isPalindromeByReserve('abccba');//回文的判断-反转链表
// isPalindrome('abccb');//回文的判断-快慢指针

/**
 * 圆形链表创建
 */
// $circle = new CircleLinkedList();
// var_dump($circle->init([1,2,3]));

/**
 * 链表中环的检测
 */
// $singleList = (new SingleLinkedList())->createListTail([1,2,3,4,5]);
// $listWithCircle = createLiknedListWithCircle([1,2,3,4,5],3);
// var_dump(checkIsHaveCircle($listWithCircle));
// var_dump(checkIsHaveCircle($singleList));
