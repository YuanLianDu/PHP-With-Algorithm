<?php
namespace Stack;

use LinkedList\LNode;


class LinkedListStack extends Stack
{
    public $top;

    public $length;

    public function __construct() {
        $this->top = new LNode();
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
        return $this->length >= 0 ? false : true;
    }

    public function getTop()
    {
        return $this->top->next->data;
    }

    public function push($item)
    {
        $node = new LNode($item);
        $node->next = $this->top->next;
        $this->top->next = $node;
        $this->length++;
    }

    public function pop()
    {
        if($this->isEmpty()) {
            print('stack is empty');
            return false;
        }
        $temp = $this->top->next;
        $this->top->next = $temp->next;
        $this->length --;
        return $temp->data;
    }

    public function length()
    {
        return $this->length;
    }
}


