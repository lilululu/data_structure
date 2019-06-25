<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-3
 * Time: 11:05
 */
//题目：
//一个排序好的数组,将它从中间任意一个位置切分成两个数组,然后交换它们的位置并合并，合并后新数组元素如:20,21,22,25,30,1,2,3,5,6,7,8,15,18,19,写一个查询函数来查找某个值是否存在
function arrFind($arr,$key){

    $count=count($arr);
    $min=$arr[0];
    $compare=0;
    if($key > $min){
        $compare=1;
    }
    $isfind=0;
    $m=0;
    for($i=1;$i<$count;$i++){
        $m++;
//      如果要找的值 大于第一个值，那么当遇到比第一个值小的值时，直接退出，因为不会在有合适的值了
//        如果要找到的值 大于第一个值，但是遇到一个比要找到的值还要大的值时  直接退出，因为 后面的值比现在更大
        if((!empty($compare) && $arr[$i] < $min) || (!empty($compare) && $arr[$i]>$key)){
            break;
        }else{
            if($arr[$i] == $key){
                $isfind=1;
                break;
            }
        }
    }
    var_dump($m);
    return $isfind;
}

//$arr=[20,21,22,25,30,1,2,3,5,6,7,8,15,18,19];
$arr=[20,210,220,250,300,1,2,3,5,6,7,8,15,18,19];

//var_dump(arrFind($arr,5));
// 求二进制
//var_dump(decbin(1));exit;

//题目 ：
//写一段代码，找到所有子集合，如[a,b,c]的子集合有{},{a},{b},{c},{ab},{ac},{abc}
//思路：
//通过二进制来表示，比如 一共三位，我们可以有如下子串
//000 []
//001 [c]
//010 b
//100 a
//101 ac
//110 ab
//111 abc
//1表示取出对应位的字符，0 表示 不取
function findSubStr($arr){
    $count=count($arr);
    $num=pow(2,$count)-1;
    $res=[];
    for($i=0;$i<=$num;$i++){
      $er=decbin($i);
      $subarr=[];
      if($er == '0'){
          echo '1--';
          $res[]=[];
      }else{
        $erLen=strlen($er);
        $m=-1;
        for($j=$erLen-1;$j>=0;$j--){
            $m++;
            if($er[$j] >0){
                $subarr[]=$arr[$count-1-$m];
            }
        }
        $res[]=$subarr;
      }
    }
    var_dump($res);
}

//findSubStr(['a','b','c']);


//$a=[0,1,2,3]; $b=[1,2,3,4,5];
//$a+=$b;
//var_dump($a);

function findUnique($arr){
    $count=count($arr);
    $new=[];
    $res=$arr;
    for($i=0;$i<$count;$i++){
        if(isset($new[$arr[$i]])){
            $new[$arr[$i]]++;
        }else{
            $new[$arr[$i]]=1;
        }
    }
    var_dump($new);
}
//findUnique([1,2,2,3,4,5,3]);
var_dump(array_count_values([1,2,2,3,4,5,3,5]));