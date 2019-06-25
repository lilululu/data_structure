<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-3-29
 * Time: 21:12
 */

$arr=[1,2,3,4,5,6,7,8,9];

$key=22;

//$res=find2($arr,$key);

//echo PHP_INT_MAX;

//$b=2147483647+2147483647;
//
//var_dump($b);
//
//exit;

$low=0;
$hign=count($arr)-1;

//$res=searchByPart($arr,$low,$hign,8);
$res=binarySearch($arr,8);
var_dump($res);

function find1($arr,$key){

    $count=count($arr);

    for($i=0;$i<$count;$i++){

        if($arr[$i] == $key){

            return $i;
        }
    }

    return false;
}

//优化后，设置哨兵，不需要每次比较下标是否过界
function find2($arr,$key){

    $n=count($arr)-1;

//    一定要先计算长度在 设置哨兵，否则长度会加1
    $arr[-1]=$key;

    while($arr[$n] != $key){

        $n--;
    }

    return $n;
}

//二分查找的递归实现
function searchByPart($arr,$low,$hign,$key){

//    向下取整,或者向上取整都可以，防止出现7.5这种情况
    $mod=round(($low+$hign)/2);
//    $mod=ceil(($low+$hign)/2);

    if($arr[$mod] >$key){

        return searchByPart($arr,$low,$mod-1,$key);
    }elseif($arr[$mod] <$key){

        return searchByPart($arr,$mod+1,$hign,$key);
    }else{

        return $mod;
    }

}

//二分查找的非递归实现
function binarySearch($arr,$key){

    $low=0;

    $high=count($arr)-2;

    while($low<=$high){

        $mid=floor(($low+$high)/2);

        if($arr[$mid]>$key){

            $high=$mid-1;
        }elseif($arr[$mid] <$key){

            $low=$mid+1;
        }else{

            return $mid;
        }
    }

    return -1;
}