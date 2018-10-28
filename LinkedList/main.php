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
    if ($strList->isSame($reverseStrList)) {
        print('the string is palindrome');
    } else {
        print('the string is not palindrome');
    }
}

/**
 * 比较是否是回文
 * 找到中间节点(通过慢指针、快指针) 反转右半部分，然后与链表相比判断是否是回文
 * 时间复杂度O(n)
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
    if ($strList->isSame($reverseRight)) {
        print('the string is palindrome');
    } else {
        print('the string is not palindrome');
    }
}

/**
 * 检车链表中是否有环
 * 时间复杂度O(n)
 * @param LinkedList $list
 *
 * @return void
 * @date 2018/10/25
 * @author yuanliandu <yuanliandu@qq.com>
 */
function checkIsHaveCircle(LinkedList $list)
{
    $slow = $list->next;
    $fast = $list->next;
    while ($fast && $fast->next) {
        $slow = $slow->next;
        $fast = $fast->next->next;
        if ($slow == $fast) {
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
function createLiknedListWithCircle(array $data, int $circleHead)
{
    $linkedList = new LinkedList();
    $head = $linkedList;
    for ($i = 1;$i < $circleHead;$i++) {
        $newNode = new LNode($data[$i - 1]);
        $head->next = $newNode;
        $head = $newNode;
        unset($data[$i - 1]);
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

/**
 * 合并有序链表
 * @param LinkedList $listOne
 * @param LinkedList $listTwo
 * 时间复杂度O(n)
 * @return void
 * @date 2018/10/28
 * @author yuanliandu <yuanliandu@qq.com>
 */
function mergeOrderList(LinkedList $listOne, LinkedList $listTwo)
{
    $result = new SingleLinkedList;
    $head = $result;
    $one = $listOne->next;
    $two = $listTwo->next;
    while ($one && $two) {
        if ($one->data < $two->data) {
            $head = $result->inserAfterNode($head, $one->data);
            $one = $one->next;
        } else {
            $head = $result->inserAfterNode($head, $two->data);
            $two = $two->next;
        }
    }
    while ($one) {
        $head = $result->inserAfterNode($head, $one->data);
        $one = $one->next;
    }
    while ($two) {
        $head = $result->inserAfterNode($head, $two->data);
        $two = $two->next;
    }

    return $result;
}

/**
 * 删除倒数第n个节点
 * 快慢指针
 * 快指针，先行n；
 * 快慢指针，一起前行；
 * 当快指针先到达终点时，慢指着到达
 * 时间复杂度O(n)
 * @param LinkedList $list
 * @param int $index
 *
 * @return void
 * @date 2018/10/28
 * @author yuanliandu <yuanliandu@qq.com>
 */
 function removeNthNodeFromEndOfList(LinkedList $list,int $index) {
    $slow = $list->next;
    $fast = $list->next;
    for($i=0;$i<$index;$i++) {
        $fast = $fast->next;
    }
    while($fast->next) {
        $slow = $slow->next;
        $fast = $fast->next;
    }
    $temp = $slow->next;
    $slow->next = $temp->next;
    unset($temp);

    return $list;
}

function josephusCircleList(LinkedList $circle,int $total,int $m) {
    $current = $circle;

    while($total--) {
        for($i=1;$i<$m-1;$i++) {
            $current = $current->next;
        }
        $temp = $current->next;
        printf("%d->", $temp->data);
        $current->next = $temp->next;
        unset($temp);
        $current = $current->next;
    }
    return $current;
}
// lru();//链表实现lru


//isPalindromeByReserve('abccba');//回文的判断-反转链表
// isPalindrome('abccb');//回文的判断-快慢指针

/**
 * 链表反转
 */
// $singleList = (new SingleLinkedList())->createListTail([1,2,3,4,5]);
// var_dump($singleList->reverse());
// $singleList->insertNode(3,9);
// var_dump($singleList);
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

/**
 * 两个有序链表合并
 */
// $listOne = (new SingleLinkedList())->createListTail([1, 3, 5, 8]);
// $listTwo = (new SingleLinkedList())->createListTail([2, 4, 9]);
// var_dump(mergeOrderList($listOne, $listTwo));

/**
 * 删除链表中倒数第n个结点
 */
// $listOne = (new SingleLinkedList())->createListTail([1, 3, 5, 8]);
// var_dump(removeNthNodeFromEndOfList($listOne,2));

/**
 * 
 */
$circleList  =  (new CircleLinkedList())->init([1,2,3,4,5,6,7]);
// var_dump($circleList);die();
var_dump(josephusCircleList($circleList,7,3));
