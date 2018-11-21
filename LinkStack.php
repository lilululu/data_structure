<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-10-11
 * Time: 15:07
 */

require './Node.php';

//栈的链式存储
class LinkStack{

    private  $top;

    private $count;

    function __construct()
    {

        $this->top=null;

        $this->count=0;

    }

    //新的节点的next 指向前面一个元素，

//    top 指向新节点的地址

    public function push($element){

        $node=new Node($element);

        $node->next=$this->top;

        $this->top=&$node;

        $this->count++;

    }

//    出栈

// top指针指向该元素的next元素
    public function pop(){

        $p=$this->top;

        $this->top=$p->next;

        $this->count--;
    }

    public function show(){

        $p=$this->top;

        while($p){

            echo '---'.$p->data;

            echo '<br/>';

            $p=$p->next;
        }
    }
}

/********

 可以发现 pop 和push操作复杂度都为 O(1)
 ********/

$stack=new LinkStack();

$stack->push(1);
$stack->push(2);
$stack->push(3);

$stack->show();

$stack->pop();

$stack->show();
