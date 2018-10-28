<?php
namespace LinkedList;


class CircleLinkedList extends LinkedList {
    
    public $data = null;
    public $next = null;

    /**
     * 初始化一个单向循环链表
     * @param array $data
     *
     * @return void
     * @date 2018/10/25
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function init(array $data) {
        $rear = $this;
        $rear->next = $this;
        foreach ($data as $key => $value) {
            $newNode = new LNode($value);
            $newNode->next = $rear->next;
            $rear->next = $newNode;
            $rear = $newNode;
        }
        return $this;
    }
}