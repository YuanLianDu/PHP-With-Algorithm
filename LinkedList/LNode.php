<?php
namespace LinkedList;

class LNode {

    /**
     * 节点的数据域，存储数据
     * @var [type]
     * @date 2018/10/23
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public $data;

    /**
     * 存储下个数据节点地址
     * @var [type]
     * @date 2018/10/23
     * @author yuanliandu <yuanliandu@qq.com>
     */
    public $next;

    public function __construct($data=null)
    {
        $this->data = $data;
        $this->next = null;
    }

}