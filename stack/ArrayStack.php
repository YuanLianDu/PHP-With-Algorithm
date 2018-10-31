<?php

namespace stack;

class ArrayStack extends Stack
{
    public $top;

    public $data;

    public $maxSize;


    public function __destruct() {
        echo "destroy array stack"; 
    }


    public function init (int $maxSize) {
        $this->maxSize = $maxSize;
        $this->top = 0;
        $this->data = new SplFixedArray($maxSize);
    }

    

    public function clear()
    {
        if(empty($this->data) || $this->top < 0 ) {
            return true;
        }
        while($this->top >= 0) {
            unset($this->data[$this->top]);
            $this->top --;
        }
        return true;
    }

    public function isEmpty()
    {
        if($this->top < 0) {
            return true;
        }
        return false;
    }

    public function getTop()
    {
        return $this->data[$this->top];
    }

    public function push($item)
    {
        if($this->top >=  $maxSize-1) {
            print('stack is small');
            return false;
        }
        $this->data[$this->top] = $item;
        $this->top++;
        return true;
    }

    public function pop()
    {
        if($this->$top == -1) {
            return false;
        }
        $ele = $this->data[$this->top];
        unset($this->data[$this->top]);
        $this->top --;

        return $ele;
    }

    public function length()
    {
        return $this->top + 1;
    }
}
