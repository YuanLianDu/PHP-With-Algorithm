<?php
namespace Stack;

use SplFixedArray;

class ArrayStack extends Stack
{
    public $top;

    public $data;

    public $maxSize;

    
    /**
     * 初始化顺序栈
     * @param int $maxSize
     *
     * @return void
     * @date 2018/11/04
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function init(int $maxSize)
    {
        $this->maxSize = $maxSize;
        $this->top = -1;
        $this->data = new SplFixedArray($this->maxSize);
    }

    /**
     * 清空栈
     * @return void
     * @date 2018/11/04
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function clear()
    {
        if (empty($this->data) || $this->top < 0) {
            return true;
        }
        while ($this->top >= 0) {
            unset($this->data[$this->top]);
            $this->top--;
        }
        return true;
    }

    /**
     * 判断栈是否为空
     * @return bool
     * @date 2018/11/04
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function isEmpty()
    {
        if ($this->top < 0) {
            return true;
        }
        return false;
    }

    /**
     * 获取栈顶
     * @return void
     * @date 2018/11/04
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function getTop()
    {
        return $this->data[$this->top];
    }

    /**
     * 进栈
     * @param [type] $item
     *
     * @return void
     * @date 2018/11/04
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function push($item)
    {
        if ($this->top > $this->maxSize - 1) {
            print('stack is small');
            return false;
        }
        $this->top++;
        $this->data[$this->top] = $item;
        
        return true;
    }

    /**
     * 出栈
     * @return void
     * @date 2018/11/04
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function pop()
    {
        if ($this->$top == -1) {
            return false;
        }
        $ele = $this->data[$this->top];
        unset($this->data[$this->top]);
        $this->top--;

        return $ele;
    }

    /**
     * 返回栈的长度
     * @return void
     * @date 2018/11/04
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public function length()
    {
        return $this->top + 1;
    }
}
