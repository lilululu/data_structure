<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-14
 * Time: 20:01
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     * 时间复杂度为 O(n^2)
     */
    function twoSum($nums, $target) {
        $count=count($nums);
        for($i=0;$i<$count;$i++){
            for($j=$i+1;$j<$count;$j++){
                if(($nums[$i]+$nums[$j]) == $target){
                    return [$i,$j];
                }
            }
        }
    }

    /**
     * @param $nums
     * @param $target
     * @return array
     * 时间复杂度为 O(n)
     */
    function twoSumPro($nums, $target) {
        $count=count($nums);
        $arr=[];
        for($i=0;$i<$count;$i++){
           $arr[$nums[$i]]=$i;
        }
        for($i=0;$i<$count;$i++){
            if($nums[$i] < $target){
                $new=$target-$nums[$i];
                if(isset($arr[$new])){
                    return [$i,$arr[$new]];
                }
            }
        }

    }
}

$solusion=new Solution();

//$res=$solusion->twoSum([2,6,1,8,4], 9);
$res=$solusion->twoSumPro([2,6,1,8,4], 9);
var_dump($res);