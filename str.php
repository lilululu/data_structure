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


        $index=0;


//        match success total
        $sum=0;

        $count1=strlen($str1);
        $count2=strlen($str2);


        for($i=0;$i<$count1;$i++){


            if($str1[$i] == $str2[$j]){

                $sum+=1;


                if($index == 0){


                    $index=$i;
                }


                $j++;

            }else{

//                if match fail ,all is start from 0

                $sum=0;

                $j=0;

                $index=0;
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


$str1='abcdefhhhhhhhhhhhg';

$str2='abcdefg';

$Str=new Str();

$Str->index($str1,$str2);