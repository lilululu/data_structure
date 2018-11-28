<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/21/18
 * Time: 3:03 PM
 */

//queue of chain table

include './Node.php';

class queueLink{


    public $head;


    public $near;

    function __construct()
    {

        $this->head=new Node();

        $this->near=$this->head;
    }

    function push($data){

        $new=new Node($data);


        $this->near->next=$new;

        $this->near=$new;
    }

    function pop(){

        if($this->isFull()){

            exit('it is full');
        }

        $next=$this->head->next;


        $this->head->next=$next->next;


        if($this->near == $next){

            $this->near = $this->head;
        }

        return $next->data;



    }

    function isFull(){


        if($this->near == $this->head){

            return true;
        }

        return false;
    }

    function show(){

        $current=$this->head;

        while($current->next){

            echo $current->next->data;

            echo '---';

            $current=$current->next;
        }
    }
}

//$queue=new queueLink();
//
//$queue->push(1);
//$queue->push(2);
//$queue->push(3);
//
//$queue->show();
//
//$queue->pop();
//
//echo '<br/>';
//$queue->show();

