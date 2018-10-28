<?php

namespace LinkedList;

class SingleLinkedList extends LinkedList
{
    public $data;
    public $next;
    public $length = 0;

    /**
     * 寻找第i个节点
     * @param int $index
     *
     * @return void
     * @date 2018/10/24
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function findNodeByIndex(int $index)
    {
        if ($index == 0) {
            return $this;
        }
        $head = $this->next;
        $count = 1;
        while ($head && $count < $index && $count < $this->length) {
            $head = $head->next;
            ++$count;
        }
        if (is_null($head) || $count > $index) {
            return false;
        }
        return $head;
    }

    /**
     * 获取第i个节点的数据
     * @param int $index
     *
     * @return void
     * @date 2018/10/23
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function getNodeDataByIndex(int $index)
    {
        return $this->findNodeByIndex($index)->data;
    }

    /**
     * 根据元素查询结点
     * @param int $data
     *
     * @return void
     * @date 2018/10/24
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function getNodeByData(int $data)
    {
        $head = $this->next;
        $count = 1;

        while ($count <= $this->length && $data != $head->data) {
            $head = $head->next;
            $count++;
        }
        if (is_null($head) || $data != $head->data || $count > $this->length) {
            return false;
        }
        $head->index = $count;
        return $head;
    }

    /**
     * 在指定i位置，插入元素
     * @param int $i
     * @param [type] $data
     *
     * @return void
     * @date 2018/10/23
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function insertNode(int $index, $data)
    {
        $iNode = $this->findNodeByIndex($index - 1);//找到i-1元素
        $newNode = new LNode($data);//创建新的i元素
        $newNode->next = $iNode->next;//新元素i的next 指向旧的i
        $iNode->next = $newNode;//i-1元素的next 指向 新i
        $this->length++ ;
    }

    /**
     * 删除第i个节点，并返回该节点数据data
     * @param int $index
     *
     * @return void
     * @date 2018/10/23
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function deleteNodeByIndex(int $index)
    {
        $node = $this->findNodeByIndex($index - 1);
        $iNode = $node->next;//找到第i个元素
        $node->next = $iNode->next;//将i-1的next指向i+1
        $data = $iNode->data;//取出第i个元素数据，准备返回
        unset($iNode);
        $this->length--;
        return $data;
    }

    /**
     * 头插法
     * @param array $data 要初始化的数据
     *
     * @return void
     * @date 2018/10/24
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function createListHead(array $data)
    {
        foreach ($data as $key => $value) {
            $node = new LNode($value);
            $node->next = $this->next;
            $this->next = $node;
            $this->length++;
        }
        return $this;
    }

    /**
     * 尾插法
     * @param array $data
     *
     * @return void
     * @date 2018/10/24
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function createListTail(array $data)
    {
        $tail = $this;//tail与this指向同一个变量地址，记录最后链表尾元素
        foreach ($data as $key => $value) {
            $node = new LNode($value);
            $tail->next = $node;//
            $tail = $node;//tail又与新的node指向同一个变量的地址
            $this->length++;
        }
        $tail->next = null;
        return $this;
    }

    /**
     * 单链表的整表删除
     * @param LinkedList $list
     *
     * @return void
     * @date 2018/10/23
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function clearList()
    {
        $head = $this->next;//第一个结点
        while (!is_null($head)) {
            $temp = $head->next;
            unset($head);
            $head = $temp;
            $this->length--;
        }

        $this->next = null;
    }

    /**
     * 链表反转
     * @return void
     * @date 2018/10/25
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function reverse()
    {
        $head = $this->next;
        $reverse = new SingleLinkedList();
        while ($head) {
            $newNode = new LNode($head->data);
            $newNode->next = $reverse->next;
            $reverse->next = $newNode;
            $reverse->length++ ;
            $head = $head->next;
        }
        return $reverse;
    }

    /**
     * 返回链表中部结点
     * @return void
     * @date 2018/10/25
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function findMiddle()
    {
        if(!$this->next) {
            return 'please init';
        }
        $slow = $this->next;
        $fast = $this->next;
        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }

    /**
     * 判断一个链表是否另一个 链表头部的一段
     * @param SingleLinkedList $list
     *
     * @return bool
     * @date 2018/10/25
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function isSame(SingleLinkedList $list)
    {
        $head = $this->next;
        $reverseHead = $list->next;
        while ($head && $reverseHead) {
            if ($head->data != $reverseHead->data) {
                return false;
            }
            $head = $head->next;
            $reverseHead = $reverseHead->next;
        }
        return true;
    }
}
