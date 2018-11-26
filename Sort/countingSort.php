<?php

/**
 * 计数排序
 * 五分制
 * 13个人
 */
$score = [0,1,5,3,2,4,1,2,4,2,1,4,4];

var_dump(countingSort($score));die();
function countingSort(array $score) {

    $length = count($score);
    if($length <= 1) {return $score;}
    
    $temp = [];
    $countScore = [];
    foreach ($score as $key => $value) {
        $countScore[$value]++;
    }
    
    for($i=1;$i<=5;$i++) {
        $countScore[$i] += $countScore[$i-1];
    }

    foreach ($score as $key => $value) {
        $countScore[$value] --;
        $temp[$countScore[$value]] = $value;
    }
    for($i=0;$i<$length;$i++) {
        $score[$i] = $temp[$i];
    }
    return $score;
}