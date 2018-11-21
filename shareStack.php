<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-10-11
 * Time: 14:17
 */

//两栈共享空间，顺序存储

//注意的点为：

// $this->top1+1 == $this->top2 为满栈
// 初始化的时候top1 为-1， top2 为max

//push 和pop操作都要传入栈的编号

class shareStack{

    private $top1;

    private $top2;

    private $data;

    public $length1;
    public $length2;

    const MAX=5;

    public function __construct()
    {

        $this->top1=-1;

        $this->top2=self::MAX;

        $this->length1=0;
        $this->length2=0;

        $this->data=array();
    }

    public function push($element,$stackNo){

        if($this->top1+1 == $this->top2){

            echo '栈已满';
        }else{

            if($stackNo ==1){

                $this->top1++;

                $this->data[$this->top1]=$element;

                $this->length1++;

            }elseif($stackNo ==2){

                $this->top2--;

                $this->data[$this->top2]=$element;

                $this->length2++;
            }


        }
    }

    public function pop($stackNo){



        if($stackNo ==1){

            if($this->top1 > -1){

                unset($this->data[$this->top1]);

                $this->top1--;
            }

        }else{

            if($this->top2 < self::MAX){

                unset($this->data[$this->top2]);

                $this->top2++;
            }
        }

        return false;

    }

    public function show(){

        echo 'top1指针为--'.$this->top1;

        echo '<br/>';

        echo '栈1的长度为--'.$this->length1;

        echo '<br/>';

        foreach($this->data as $k=>$v){

            echo $k.'=='.$v;

            echo '<br/>';
        }
    }

}

$stack=new shareStack();

$stack->push(1,1);
$stack->push(2,2);
$stack->push(3,1);

$stack->show();
$stack->pop(1);
$stack->show();