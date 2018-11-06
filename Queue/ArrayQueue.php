<?php
namespace Queue;

use SplFixedArray;

class ArrayQueue {
    
    public $head;
    public $tail;
    public $maxSize;
    public $data;

    public function __construct(int $maxSize) {
        $this->head = 0;
        $this->tail = 0;
        $this->maxSize = $maxSize;
        $this->data = new SplFixedArray($maxSize);
    }

    /**
     * 进队
     * 判断队列是否满了（tail+1）% maxSize = head
     * @param [type] $item
     *
     * @return void
     * @date 2018/11/06
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function EnQueue($item) {
        //判断队列是否满了
        if(($this->tail+1)%$this->maxSize == $this->head) {
            print('the Queue is full') . "\n";
            return false;
        }
        $this->data[$this->tail] = $item;
        $this->tail = ($this->tail + 1) % $this->maxSize;
    }

  /**
   * head控制删除
   * 判断队列是否空了，根据head == tail
   * @return void
   * @date 2018/11/06
   * @author yuanliandu <yuanliandu@qq.com>
   */
    public function DeQueue() {

        // 判断队列是否空
        if($this->tail == $this->head) {
            print('the Queue is empty') . "\n";
            return false;
        }
        $ele = $this->data[$this->head];
        unset($this->data[$this->head]);
        $this->head = ($this->head+1) % $this->maxSize;
       
        return $ele;
    }

    /**
     * 返回队列元素个数
     * @return void
     * @date 2018/11/06
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function QueueLength() {
        return ($this->tail - $this->head + $this->maxSize) % $this->maxSize;
    }

    /**
     * 获取队列头部元素
     * @return void
     * @date 2018/11/06
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function getHead() {
        if($this->tail == $this->head) {
            print('the Queue is empty') . "\n";
            return false;
        }
        return $this->data[$this->head];
    }

    /**
     * 清空队列
     * @return void
     * @date 2018/11/06
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function Clear() {
        unset($this->data);
        $this->head = 0;
        $this->tail = 0;
    }
}