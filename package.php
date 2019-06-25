<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-5-17
 * Time: 13:49
 */

//背包问题
//背包问题，获取最大空间
function getMaxValue($package,array $goods,array $values){
    $count=count($goods);
    $d=[];
    for($i=0;$i<$count;$i++){
        for($j=0;$j<=$package;$j++){
            if($i==0 && $j>=$goods[$i]){
//                这里直接改为values
                $d[$i][$j]=$values[$i];
            }elseif($i== 0 && $j<$goods[$i]){
                $d[$i][$j]=0;
            }elseif($i>0 && $j>=$goods[$i]){
//               该公式为重点
                $d[$i][$j]=max($d[$i-1][$j],$d[$i-1][$j-$goods[$i]]+$values[$i]);
            }elseif($i>0 && $j<$goods[$i]){
                $d[$i][$j]=$d[$i-1][$j];
            }
        }
    }
    return $d[$count-1][$package];
}

//背包问题，获取最大空间
function getMaxSpace($package,array $goods){
    $count=count($goods);
    $d=[];
    for($i=0;$i<$count;$i++){
       for($j=0;$j<=$package;$j++){
           if($i==0 && $j>=$goods[$i]){
               $d[$i][$j]=$goods[$i];
           }elseif($i== 0 && $j<$goods[$i]){
               $d[$i][$j]=0;
           }elseif($i>0 && $j>=$goods[$i]){
//               该公式为重点
               $d[$i][$j]=max($d[$i-1][$j],$d[$i-1][$j-$goods[$i]]+$goods[$i]);
           }elseif($i>0 && $j<$goods[$i]){
               $d[$i][$j]=$d[$i-1][$j];
           }
       }
    }
   return $d[$count-1][$package];
}

//$max=getMaxSpace(12,[2,4,5,9]);
$max=getMaxValue(10,[2,3,5,7],[10,5,2,4]);
var_dump($max);
