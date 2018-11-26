<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/21/18
 * Time: 3:49 PM
 */



class Str{

//    find the index str2 in str1

    function index($str1,$str2){


        $j=0;

        $flag=0;

        $index=null;

//        match success total
        $sum=0;

        $count1=strlen($str1);
        $count2=strlen($str2);

        $i=0;

        while($i<$count1){

            if($str1[$i] == $str2[$j]){

                $sum+=1;

                if($index === null){


                    $index=$i;
                }


                $j++;

                $i++;
            }else{

//                if match fail ,all is start from 0


                $i=$i-$j+1;

                $sum=0;

                $j=0;

                $index=null;
            }

            if($sum == $count2){


                $flag=1;

                break;
            }



        }

        if($flag){

            echo 'success_'.$index;
        }else{

            echo 'fail_';
        }


        echo "\n";

    }


}

//$str1='bbbbc';
//
//$str2='bbbc';

$str1='abcdefgf';

$str2='abcde';

$Str=new Str();

$Str->index($str1,$str2);