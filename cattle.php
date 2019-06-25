<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-5-5
 * Time: 8:55
 */

function getCattleNum($n){
  static $num=1;
  for($i=1;$i<=$n;$i++){
      if($i>=4 && $i<15){
          $num++;
          getCattleNum($n-$i+1);
      }elseif($i== 20){
          $num--;
      }
  }
  return $num;
}
//var_dump(getCattleNum(8));

function jieti($n){
    return $n<2? 1 :jieti($n-1)+jieti($n-2);
}
//var_dump(jieti(4));

$arr=[9,3,2,3,4,5,2];
//[9,3,2,4,5]
$unique=array_unique($arr);
$unique=[9,3,2,4,5];
//quikSort($unique,0,count($unique)-1);
//insertSort($unique);
//var_dump($unique);


function insertSort(&$arr){
    $count=count($arr);
    for($i=1;$i<$count;$i++){
//        如果当前值和前面的数据刚好有序，则不在操作
        if($arr[$i]<$arr[$i-1]){
            $tmp=$i;
            for($j=$i-1;$j>=0;$j--){
                if($arr[$tmp]<$arr[$j]){
                    swap($arr,$tmp,$j);
                    $tmp--;
                }else{
                    break;
                }
            }
        }

    }
}

function quikSort(&$arr,$low,$high){
    if($low<$high){
        $mid=partition($arr,$low,$high);
        quikSort($arr,$low,$mid-1);
        quikSort($arr,$mid+1,$high);
    }
}
function partition(&$arr,$low,$high){
    $midkey=($low+$high)/2;
    if($arr[$low] > $arr[$high]){
        swap($arr,$low,$high);
    }
    if($arr[$midkey] > $arr[$high]){
        swap($arr,$midkey,$high);
    }
    if($arr[$midkey] > $arr[$low]){
        swap($arr,$low,$midkey);
    }
    $mid=$arr[$low];
    while($low<$high){
        while($low<$high && $arr[$high] >$mid){
            $high--;
        }
        swap($arr,$high,$low);
        while($low<$high && $arr[$low] <$mid){
            $low++;
        }
        swap($arr,$low,$high);
    }
    return $low;
}

function swap(&$arr,$i,$j){
    if($i!=$j){
        $tmp=$arr[$i];
        $arr[$i]=$arr[$j];
        $arr[$j]=$tmp;
    }
}
//反转字符串
$str='abcde';
$len=strlen($str);
$newstr='';
for($i=$len-1;$i>=0;$i--){
    $newstr.=$str[$i];
}
//echo $newstr;

//class A{
//    public function __construct(){
//        echo "Class A...<br/>";
//    }
//}
//class B extends A{
//    public function __construct(){
////        parent::__construct();
//        echo "Class B...<br/>";
//    }
//}
//new B();

class A{
    public $num=100;
}
$a = new A();
$b = $a;
$a->num=200;
echo $b->num;