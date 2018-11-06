<?php

namespace Queue;

use LinkedList\LNode;

class ListQueue {
    
    public $front;

    public $rear;

    public function __construct() {
        $this->front = new LNode();
        $this->rear = $this->front;
    }

    /**
     * 入队
     * 创建一个新节点b
     * 将原来的尾巴节点指向的对象a的next指向b
     * 再把新节点b赋值给尾巴指针rear
     * @param [type] $item
     *
     * @return void
     * @date 2018/11/06
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function Enqueue($item) {
        $newNode = new LNode($item);
        $newNode->next = null;
        $this->rear->next = $newNode;
        $this->rear = $newNode;
    }

    public function Dequeue() {
        if ($this->rear == $this->front) {
            print('the Queue is empty') . "\n";
            return false;
        }
        $temp = $this->front->next;//记录头结点指向的对象a
        $this->front->next = $temp->next;//将头结点指向对象a下个对象b
        //如果尾指针指向的对象等于a，说明a出队后，该队列为空，rear应和front指向同一个空对象
        if ($this->rear == $temp) {
            $this->rear = $this->front;
        }
        $data = $temp->data;
        unset($temp);
       return $data;
    }
    
    /**
     * 遍历队列计算长度
     * @return void
     * @date 2018/11/06
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function QueueLength() {
        $length = 0;
        $head = $this->front;
        while($head->next != null) {
            $head = $head->next;
            $length ++;
        }
        return $length;
    }
    

    /**
     * 返回队列头部的数据
     * @return void
     * @date 2018/11/06
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function GetHead() {
        return $this->front->next->data;
    }

    /**
     * 清空队列
     * @return void
     * @date 2018/11/06
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function clear() {
        while($this->front->next != null) {
            $this->Dequeue();
        }
    }




}