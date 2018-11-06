<?php

namespace Stack;

use SplFixedArray;

class DoubleStack
{
    /**
     * 共享栈
     */
    public $data;
    public $maxSize;
    public $top;
    public $bottom;

    public function __construct(int $maxSize) {
        $this->top = -1;
        $this->bottom = $maxSize;
        $this->maxSize = $maxSize;
        $this->data = new SplFixedArray($this->maxSize);
    }
    /**
     * 插入元素
     * 判断栈是否已满
     * @param [type] $data
     * @param int $stackNumber
     *
     * @return void
     * @date 2018/11/04
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function push($data,int $stackNumber) {
        if($this->top == $this->bottom -1) {
            print('the stack is full ')."\n";
            return false;
        }
        if($stackNumber == 1) {
            $this->data[++$this->top] = $data;
        }else {
            $this->data[--$this->bottom] = $data;
        }
    }

    public function pop(int  $stackNumber){
         if($stackNumber == 1) {
             if($this->top < 0 ) {
                 print('the stack one is empty')."\n";
                 return false;
             }
             $e = $this->data[$this->top];
             unset($this->data[$this->top]);
             $this->top--;
         }

         if($stackNumber == 2) {
             if($this->bottom == $this->maxSize) {
                print('the stack one is empty')."\n";
                return false;
             }
             $e =  $this->data[$this->bottom];
             unset($this->data[$this->bottom]);
             $this->bottom ++;
         }
         return $e;
    }
}
