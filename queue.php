<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-10-12
 * Time: 16:28
 */

/**
 * Class queue
 *
 * 顺序存储的循环队列
 *
 * 当font = near 时，队列为空
 * 由于near指向队尾元素的下一个位置，所以当对满时，还有一个空闲元素
 *
 */

class queue{


//    指向队头元素
    private $font;

//    指向队尾元素的下一个位置，注意这里是下一个元素
    private $near;

    public $data;

    const MAX=5;

    public function __construct()
    {

        $this->font=0;

        $this->near=0;

        $this->data=array();
    }

    function isFull(){

        return ($this->near+1)%self::MAX==$this->font;
    }

    /**
     * @param $element
     *
     * 元素从队尾入栈，所以只操作尾指针
     */
    public function enQueue($element){

        if($this->isFull()){

            die('队列已满');
        }

        $this->data[$this->near]=$element;

//        这里取余数组的长度，因为到了最后一个元素之后，near又要从头开始

        $this->near=($this->near+1)%self::MAX;

    }

    public function isEmpty(){

        return $this->font == $this->near;
    }

    public function outQueue(){

        if($this->isEmpty()){

            die('是空队列');
        }

        $this->data[$this->font]='';

//        font 指针指向下一位，如果到最后，会转向头部

        $this->font=($this->font+1)%self::MAX;
    }

    function show(){

        if($this->isEmpty()){

            die('是空队列');
        }

        foreach($this->data as $k=>$v){

            echo $k.'---'.$v;


            echo '<br/>';
        }
    }

}

$queue=new queue();

$queue->enQueue(1);
$queue->enQueue(2);
$queue->enQueue(3);

$queue->show();
$queue->outQueue();

$queue->show();