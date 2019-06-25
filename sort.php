<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-12-10
 * Time: 11:39
 */
class Sort
{

    public $arr = [];

    public $count;

    function __construct($arr)
    {
        $this->arr = $arr;

        $this->count = count($arr);

    }

    function isEmpty()
    {

        if (empty($this->arr)) {

            return true;
        }

        return false;
    }

    function swapSort()
    {
        if ($this->isEmpty()) return false;
        for ($i = 0; $i < $this->count; $i++) {
            for ($j = $i + 1; $j < $this->count; $j++) {

                if ($this->arr[$j] < $this->arr[$i]) {

                    $this->swap($this->arr, $j, $i);
                }
            }
        }


        var_dump($this->arr);
    }

    function bubbleSort()
    {

        if ($this->isEmpty()) return false;

        for ($i = 0; $i < $this->count; $i++) {

            for ($j = $this->count - 2; $j >= $i; $j--) {

                if ($this->arr[$j] > $this->arr[$j + 1]) {

                    $this->swap($this->arr, $j, $j + 1);
                }
            }
        }


        var_dump($this->arr);
    }

    function bubbleSort2()
    {

        if ($this->isEmpty()) return false;

        $isSwap = 1;

        for ($i = 0; $i < $this->count && $isSwap; $i++) {

            $isSwap = 0;

            for ($j = $this->count - 2; $j >= $i; $j--) {

                if ($this->arr[$j] > $this->arr[$j + 1]) {

                    $this->swap($this->arr, $j, $j + 1);

                    $isSwap = 1;
                }
            }
        }


        var_dump($this->arr);
    }


    function quickSort()
    {

        if ($this->isEmpty()) return false;

        $this->qSort($this->arr, 0, $this->count - 1);


        var_dump($this->arr);


    }

    function qSort(&$arr, $low, $high)
    {
        if ($low < $high) {
            $middle = $this->getMiddle($arr, $low, $high);
            $this->qSort($arr, $low, $middle - 1);
            $this->qSort($arr, $middle + 1, $high);
        }
//
    }


    function getMiddle(&$arr, $low, $high)
    {
        $mid=($low+$high)/2;
//        保证右端比左端大
        if($arr[$low] > $arr[$high]){
            $this->swap($arr,$low,$high);
        }
//        保证右端比中间大
        if($arr[$mid] > $arr[$high]){
            $this->swap($arr,$high,$mid);
        }
//        此时右边是最大值，将中间大的值 放到左边
        if($arr[$mid]>$arr[$low]){
            $this->swap($arr,$mid,$low);
        }
//        默认第一个值作为基准值
        $middleKey = $arr[$low];
        while ($low < $high) {
//            从右端查找比基准值小的元素 并和左端low指向的值进行交换
            while ($low < $high && $arr[$high] >= $middleKey) {
                $high--;
            }
//            $this->swap($arr, $low, $high);
            $arr[$low]=$arr[$high];
//            从左端查找比基准值大的元素 并和 右端high指向的值进行交换
            while ($low < $high && $arr[$low] <= $middleKey) {
                $low++;
            }
//            $this->swap($arr, $low, $high);
            $arr[$high]=$arr[$low];
        }
//        将基准值放回中间
        $arr[$low]=$middleKey;
        return $low;
    }

    function swap(&$arr, $i, $j)
    {

        $tmp = $arr[$i];

        $arr[$i] = $arr[$j];

        $arr[$j] = $tmp;

    }

    function selectSort()
    {

        if ($this->isEmpty()) return false;

        for ($i = 0; $i < $this->count; $i++) {

            $min = $i;

            for ($j = $i + 1; $j < $this->count; $j++) {

                if ($this->arr[$j] < $this->arr[$i]) {

                    $min = $j;
                }
            }

            if ($min != $i) {

                $this->swap($this->arr, $i, $min);
            }
        }

    }

//    直接插入排序，扑克牌算法，

    function insertSort()
    {

        for ($i = 1; $i < $this->count; $i++) {

            if ($this->arr[$i - 1] > $this->arr[$i]) {

                $this->arr[-1] = $this->arr[$i];

                for ($j = $i - 1; $this->arr[$j] > $this->arr[-1]; $j--) {

                    $this->arr[$j + 1] = $this->arr[$j];
                }

                $this->arr[$j + 1] = $this->arr[-1];
            }
        }

        unset($this->arr[-1]);

        var_dump($this->arr);
    }

    function insertSort2(){
        $count=count($this->arr);
        for($i=1;$i<$count;$i++){
            if($this->arr[$i]<$this->arr[$i-1]){
//                如果当前值 小于前一个值 则继续交换，直到不小于
                for($j=$i;$this->arr[$j]<$this->arr[$j-1];$j--){
                    $this->swap($this->arr,$j,$j-1);
                }
            }
        }
        var_dump($this->arr);
    }


}

$arr = [8, 2, 6, 5, 10, 15, 1, 7];

$sort = new Sort($arr);

//$sort->bubbleSort();
//$sort->quickSort();

//$arr2=[1,2,6,5,7,8,15,10];
//$res=$sort->getMiddle($arr2,0,7);

$sort->insertSort();
//var_dump($res);