<?php
namespace LinkedList;

class LruCache {
    public $list;

    public $cacheLength = 10;

    public function __construct(int $length = 10)
    {
        $this->cacheLength = $length;
        $this->list = new SingleLinkedList();
    }

    /**
     * * 访问一个数据时，
     * 如果存在链表内，需要遍历链表，找到该节点，并删除原来的位置，并插入到链表头部
     * 不存在，
     *  判断链表是否已满，
     *  满了，删除尾部元素；
     *  不满，插入到头部；
     * @param int $data
     *
     * @return void
     * @date 2018/10/24
     * @author liuhuihui <liuhuihui@comteck.cn>
     */
    public function getData(int $data) {
        if($node = $this->list->getNodeByData($data)) {
            $this->list->deleteNodeByIndex($node->index);
            $this->list->insertNode(1,$data);
        }else {
            if ($this->list->length < $this->cacheLength) {
                $this->list->insertNode(1,$data);
            }else {
                $this->list->deleteNodeByIndex($this->list->length);
                $this->list->insertNode(1,$data);
            }
        }
        return $this->list;
    }
}