<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-9-19
 * Time: 10:32
 */

class OrderList {

    public $data=[];

    public $length=0;

    public function __construct($data){

        $this->data=$data;

        $this->length=count($data);

    }

//    复杂度为O(1)
    public function getElem($index){

        if($index >= 0 && $index < $this->length){

            return $this->data[$index];
        }

        return false;

    }

//复杂度为 O(n-$index)=O(n)
//这里index 从0开始
    public function insert($elem,$index){


        if($index <= $this->length){


            for($i=$this->length-1; $i>=$index;$i--){


                $this->data[$i+1]=$this->data[$i];
            }


        }


        $this->data[$index]=$elem;

//        表长加1

        $this->length=$this->length+1;

    }

    //复杂度为 O(n-$index)=O(n)

    //这里index 从1开始
    public function delete($index){




        if($index <= $this->length-1){



            for($i=$index;$i<$this->length-1;$i++){

                $this->data[$i]=$this->data[$i+1];

            }


            unset($this->data[$this->length-1]);

            $this->length--;


        }else{

            die('error');
        }


    }




}

$l=new OrderList([1,2,3,4]);

//$res=$l->getElem(1);

$l->insert(5,1);


$l->delete(4);


$res=$l->data;



var_dump($res);
