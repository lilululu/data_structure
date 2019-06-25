<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-5-27
 * Time: 10:12
 */
/**
 * @param $dir
 * 读取一个目录下的所有文件
 */
function allFiles($dir){
    if($dh=opendir($dir)){
        while(($file=readdir($dh)) !== false){
            if($file != '.' && $file !== '..'){

                if(is_dir($dir.'/'.$file)){
                    allFiles($dir.'/'.$file);
                }else{
                    var_dump($file);
                }
            }
        }
    }
}
//allFiles('../dir');
/**
 * @param $url
 * 从一个标准url 获取文件扩展名
 */
function getExt($url){
//    Array ( [scheme] => http [host] => mall.foooooot.com [path] => /admin/index/index.html )
    $base=parse_url($url);
//    index.html
    $file=basename($base['path']);
    $ext=explode('.',$file);
    var_dump($ext[1]);
}
getExt('http://mall.foooooot.com/admin/index/index.html');