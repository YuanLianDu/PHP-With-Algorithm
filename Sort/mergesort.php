<?php

/**
 * 归并排序
 */

 $numbers = [
        ['value' => 2],
        ['value' => 3], 
        ['value' => 4], 
        ['value' => 5], 
        ['value' => 6,'index'=>1], 
        ['value' => 6,'index'=>2], 
        ['value' => 7], 
        ['value' => 8]];
 $length = count($numbers);
 var_dump(separate($numbers, 0, $length - 1));

 function separate(array $numbers, $start, $end)
 {
     if ($start >= $end) {
         return [$numbers[$end]];
     }

     $middle = (int)(($start + $end) / 2);

     $left = separate($numbers, $start, $middle);
     $right = separate($numbers, $middle + 1, $end);
     return merge($left, $right);
 }

function merge(array $left, array $right)
{
    $temp = [];
    $leftLength = count($left);
    $rightLength = count($right);
    $i = 0;
    $j = 0;

    /**
     * 逐个对比两个数组的元素大小
     * 将较小的放在临时数组中
     */
    do {
        if ($left[$i]['value'] <= $right[$j]['value']) {
            $temp[] = $left[$i];
            $i++;
        } else {
            $temp[] = $right[$j];
            $j++;
        }
    } while ($i < $leftLength && $j < $rightLength);

    $start = $i;
    $end = $leftLength;
    $copy = $left;
    if ($j < $rightLength) {
        $start = $j;
        $end = $rightLength;
        $copy = $right;
    }
    // var_dump($j);var_dump($rightLength);var_dump($left);var_dump($right);
    // var_dump($start);var_dump($copy);die();
    for (;$start < $end;$start++) {
        $temp[] = $copy[$start];
    }
    // var_dump($temp);die();
    return $temp;
}
