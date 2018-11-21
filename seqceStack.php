<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-9-25
 * Time: 16:51
 */

//顺序存储的栈

require './Stack.php';

//栈的下标从0开始计算

//注意的点为：

//push操作 先top++ 在操作data
//pop操作 先操作data 在操作top--

class seqceStack{

    private $top;

    private $data;

    public $length;

    const MAX=20;

    public function __construct()
    {

        $this->top=-1;

        $this->length=0;

        $this->data=array();
    }


    //    时间复杂度为O(1)

    public function push($element){

        if($this->top == self::MAX-1){

            echo '该栈已满';

        }else{

            $this->top++;

            $this->data[$this->top]=$element;

            $this->length++;

            echo $element.'入栈成功';

            echo '<br/>';
        }


    }

//    时间复杂度为O(1)

    public function pop(){

        if($this->top !== -1){

            unset($this->data[$this->top]);

//            不要忘记top指针减一

            $this->top--;

            $this->length--;

        }else{

            echo '该栈为空';

            echo '<br/>';
        }


    }

    public function show(){

        echo 'top指针为--'.$this->top;

        echo '<br/>';

        echo '栈的长度为--'.$this->length;

        echo '<br/>';

        print_r($this->data);
    }




}


$stack=new seqceStack();

$stack->push(1);
$stack->push(2);
$stack->push(3);

$stack->show();
$stack->pop();
$stack->show();

