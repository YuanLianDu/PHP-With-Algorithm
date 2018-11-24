<?php

$numbers = [5,4,3,2,1,6];
$length = count($numbers);
$start = 0;
$end = $length - 1;
quickSort($numbers,$start,$end);


function quickSort(&$numbers,$start,$end) {
    if($start >= $end) {
        return $numbers;
    }

    $index = departion($numbers,$start,$end);
    
    quickSort($numbers,$start,$index-1);
    quickSort($numbers,$index+1,$end);
}

function departion(&$numbers,$start,$end) {
    $pivot = $numbers[$end];
    $i = $start;
    $j = $start;
    for(;$j<$end;$j++) {
        if($numbers[$j] < $pivot) {
            $temp = $numbers[$j];
            $numbers[$j] = $numbers[$i];
            $numbers[$i] = $temp;
            $i++;
        }
    }
    $numbers[$end] = $numbers[$i];
    $numbers[$i] = $pivot;
    
    return $i;
}