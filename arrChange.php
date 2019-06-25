<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-5-24
 * Time: 9:13
 */

function arrChange($arr){

//    行数
    $count=count($arr);
//    列数
    $col=count($arr[0]);
    $new=[];
// 从列开始循环
    for($j=0;$j<$col;$j++){
        for($i=0;$i<$count;$i++){
            $new[$j][]=$arr[$i][$j];
        }
    }
    return $new;
}
// 4*3
//3 * 4
$arr=array(
    [1,1,1,1,1,1,1],
    [2,2,2,2,2,2,2],
    [3,3,3,3,3,3,3],
    [4,4,4,4,4,4,4],
);

$res=arrChange($arr);
var_dump($res);