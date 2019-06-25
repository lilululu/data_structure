<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-5-24
 * Time: 8:56
 */

//比较两个数组是否完全相等
function compareArr($arr1,$arr2){
    $count1=count($arr1);
    $count2=count($arr2);
//    长度不同
    if($count1 != $count2){
        return false;
    }
    foreach($arr1 as $k =>$v){
//        如果键不存在，则不相同
        if(!isset($arr2[$k])){
            return false;
        }
        $is_array1=is_array($arr1[$k]);
        $is_array2=is_array($arr2[$k]);
//        如果都是数组
        if($is_array1 && $is_array2){
            if(!compareArr($arr1[$k],$arr2[$k])){
                return false;
            };
        }elseif((!$is_array1 && $is_array2) || ($is_array1 && !$is_array2)){
            return false;
        }elseif($arr1[$k] != $arr2[$k]){

            return false;
        }
    }
    return true;
}

//$arr1=array(
//    [2,2,3,4],
//    [2,2,3,4],
//    [3,2,3,4],
//
//);
//$arr2=array(
//    [2,2,3,4],
//    [2,2,3,4],
//    [3,2,3,4],
//
//);
$arr1=array(
   'a' =>[2,2,3,4],
   'b' =>'1',
   'c' =>'1',
   'd' =>'1',
);
$arr2=array(
    'a' =>'1',
    'b' =>'1',
    'e' =>'1',
    'd' =>'1',
);
//var_dump(compareArr($arr2,$arr1));

//输出螺旋矩阵
/**
 *  目标
 *   1  2  3  4
 *  12 13 14 5
 *  11 16 15 6
 *  10 9  8  7
 *
 *  坐标生成
 *  00 01 02 03
 *  10 11 12 13
 *  20 21 22 23
 *  30 31 32 33
 *
 * n阶矩阵 则循环 n/2 次
 * 每次循环 按顺序 生成 上，右 、下 、左
 **/
function printArr($n){
    $res=[];
    $k=1;
//    向上取整
    $count=ceil($n/2);
    for($i=0;$i<$count;$i++){
//        上
//        列从$i 开始 到 $n-$i
//        每次生成 低$i 行的$j 列
        for($j=$i;$j<$n-$i;$j++){
            $res[$i][$j]=$k;
            $k++;
        }
//        右
//        i+1 表示 第一个数字已经被 上面的行 生成了
//        生成 一整列
        for($r=$i+1;$r<$n-$i;$r++){
            $res[$r][$j-1]=$k;
            $k++;
        }
//        下
//        倒序生成下面一整行
//        n-1 表示最大的下标，-i 表示去掉已经生成的列，再减1因为 列要一直减到0
        for($d=$n-1-$i-1;$d>=$i;$d--){
            $res[$r-1][$d]=$k;
            $k++;
        }
//        左
//        升序生成左边的一列
        for($l=$n-$i-1-1;$l>$i;$l--){
//            echo '左--'.$l.'--'.($d+1).'--'.$k;
//            echo '<br>';
            $res[$l][$d+1]=$k;
            $k++;
        }
    }
    // 输出 就按生成的顺序一样 遍历循环 上下左右就可以了
    var_dump($res);
}
printArr(4);