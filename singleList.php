<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-9-20
 * Time: 13:36
 */

include './Node.php';

//单链表

class singleLinkList{

    public $head;

    public $length=0;

    public function __construct()
    {

        $this->head=new Node();

    }

    public function add($data){

        $current=$this->head;


        while($current->next != null){

            $current=$current->next;
        }

        $current->next=new Node($data);

        $this->length++;


    }

//    index 从1开始

    public function insert($index,$data){

        $current=$this->head;

        $i=1;

        if($index > $this->length){

            die('该节点不存在');
        }


        while($i<$index){


            $current=$current->next;

            $i++;
        }


        $p=new Node($data);

        $p->next=$current->next;

        $current->next=$p;

        $this->length++;

    }

//    时间复杂度是O(n)

    public function delete($index){

        $current=$this->head;

        $i=1;

        if($index > $this->length){

            die('该节点不存在');
        }


        while($i<$index){


            $current=$current->next;

            $i++;
        }

        $q=$current->next;

        $current->next=$q->next;

//        回收该节点

        unset($q);

        $this->length--;

    }

    public function show(){

        $current=$this->head;

        while($current->next != null){


            $current=$current->next;

            echo $current->data;


            echo '<br/>';


        }
    }

//    清空整个链表只要清空头部的next为null就可以了？

//因为其他的节点会因为没有人引用而被回收内存？

    public function clearList(){

        $this->head->next=null;


    }

}

$singleList=new singleLinkList();

$singleList->add(1);
$singleList->add(2);
$singleList->add(3);
$singleList->insert(2,5);


//$singleList->show();

echo '-------------------';

echo '<br/>';

//$singleList->delete(4);

$singleList->clearList();

$singleList->show();


