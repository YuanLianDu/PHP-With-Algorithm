<?php
namespace Stack;

use LinkedList\LNode;


class LinkedListStack extends Stack
{
    public $top;

    public $length;

    public function __construct() {
        $this->top = null;
        $this->length = 0;
    }
    

    //  public function destroy(){}
    public function clear()
    {
        while(!is_null($this->top->next)) {
            $this->pop();
        }
        return true;
    }

    public function isEmpty()
    {
        return $this->length > 0 ? false : true;
    }

    public function getTop()
    {
        return $this->top->data;
    }

    public function push($item)
    {
        $node = new LNode($item);
        $node->next = $this->top;
        $this->top = $node;
        $this->length++;
    }

    public function pop()
    {
        if($this->isEmpty()) {
            print('stack is empty');
            return false;
        }
        $temp = $this->top->data;
        $this->top = $this->top->next;
        $this->length --;
        return $temp;
    }

    public function length()
    {
        return $this->length;
    }
}


