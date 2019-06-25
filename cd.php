<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-5-27
 * Time: 13:20
 */
//


//你作为一名出道的歌手终于要出自己的第一份专辑了，你计划收录 n 首歌而且每首歌的长度都是 s 秒，每首歌必须完整地收录于一张 CD 当中。每张 CD 的容量长度都是 L 秒，而且你至少得保证同一张 CD 内相邻两首歌中间至少要隔 1 秒。为了辟邪，你决定任意一张 CD 内的歌数不能被 13 这个数字整除，那么请问你出这张专辑至少需要多少张 CD ？
//三个正整数 n, s, L。 保证 n ≤ 100 , s ≤ L ≤ 10000

/**
 * @param $n int 歌曲数目
 * @param $s int 每首歌长度
 * @param $l int 每张cd长度
 * @return float 共需多少cd
 */
function getCdCount($n,$s,$l){
//   一张CD最多录多少
    $m=floor($l/$s);

//    理论上录m首需要的总长度
    $need=$m*$s+$m-1;
//    如果大于真实长度
//    则少录一首
    if($need >$l){
        $m=$m-1;
    }
    return ceil($n/$m);
}

echo getCdCount(7,2,6);