<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-9-12
 * Time: 15:21
 */

function getNum($n){
    if($n<=0){
        return 0;
    }elseif($n==1){
        return 1;
    }
    return getNum($n-1)+getNum($n-2);
}

function getNum2($n){
    $arr=[];
    $arr[0]=0;
    $arr[1]=1;
    for($i=2;$i<=$n;$i++){
        $arr[$i]=$arr[$i-1]+$arr[$i-2];
    }

    return $arr[$n];
}
$n=1;
while($n<7){
    echo getNum2($n)."<br/>";
    $n++;
}


