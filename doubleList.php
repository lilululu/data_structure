<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-9-25
 * Time: 14:27
 */

include './Node.php';

/**
 * Class doubleList
 *
 * 总结：双向链表删除和添加时，都要考虑两个指针的变化，及对前后两个阶段指针指向的影响
 *
 */

//双循环链表
class doubleList{

    public $head;

    public $length=0;

    public function __construct()
    {

        $p=new doubleNode();



        $this->head=$p;

//        应该先赋值给head 然后在设置指向

//        因为如果先赋值其next为head，此时的head为null

        $p->next=$this->head;
        $p->prior=$this->head;

    }

    public function add($data){

        $current=$this->head;


        while($current->next != $this->head){


            $current=$current->next;
        }


        $p=new doubleNode($data);

        $current->next=$p;


        $p->prior=$current;


//        尾指针的后驱指向头结点

        $p->next=$this->head;

//        头指针的前驱指向尾节点

        $this->head->prior=$p;

        $this->length++;


    }

    function insert($data,$index){

        $current=$this->head;

        $i=1;

        while($i<$index){


            $current=$current->next;

            $i++;
        }

        $p=new doubleNode($data);

        $q=$current->next;



        $current->next=$p;

        $p->prior=$current;

        $p->next=$q;

        $q->prior=$p;

    }

    function del($index){

        $current=$this->head->next;

        $i=1;

        while($i<$index){


            $current=$current->next;

            $i++;
        }

        $prior=$current->prior;

        $next=$current->next;


        $prior->next=$next;

        $next->prior=$prior;


    }

    public function show(){

        $current=$this->head;

        while($current->next != $this->head){


            $current=$current->next;

            echo '当前元素为 ：'.$current->data;

            echo '<br/>';

            echo '前置元素为 ：'.$current->prior->data;

            echo '<br/>';

            echo '后置元素为 ：'.$current->next->data;


            echo '<br/>';

            echo '---------------';

            echo '<br/>';


        }
    }

}


$singleList=new doubleList();

$singleList->add(1);
$singleList->add(2);
$singleList->add(3);
$singleList->insert(5,2);

//$singleList->show();
$singleList->del(3);


$singleList->show();

echo '-------------------';

echo '<br/>';
