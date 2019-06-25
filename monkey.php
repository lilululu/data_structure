<?php
function getKing($n,$m){
//    range 方法生成给定值的数组
    $arr=range(1,$n);
    $i=0;
    while(count($arr) > 1){
//        i作为下标变量
        $i+=1;
//        弹出第一个元素，并返回
        $first=array_shift($arr);
//        如果该元素不能整除m,则吧该元素放回数组尾部
        if($i % $m >0){
//           向数组尾部添加一个元素
            array_push($arr,$first);
        }
    }
    return $arr[0];
}
$res=getKing(10,3);
var_dump($res);
