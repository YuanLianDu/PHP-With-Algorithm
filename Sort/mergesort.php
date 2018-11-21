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
        ['value' => 6,'index'=>2], //index，用来测试是否稳定
        ['value' => 7], 
        ['value' => 8]];
 $length = count($numbers);

 var_dump(separate($numbers, 0, $length - 1));

 /**
  * 先将数组拆到最小单位
  * @param array $numbers
  * @param [type] $start
  * @param [type] $end
  *
  * @return void
  * @date 2018/11/21
  * @author yuanliandu <yuanliandu@qq.com>
  */
 function separate(array $numbers, $start, $end)
 {
     if ($start >= $end) {
         return [$numbers[$end]];
     }

     $middle = (int)(($start + $end) / 2);//遇到奇数，取整；左边多一个，右边多一个无所谓；

     $left = separate($numbers, $start, $middle);//需要理解递归的意义
     $right = separate($numbers, $middle + 1, $end);
     return merge($left, $right);//调用合并函数
 }

 /**
  * 合并
  * @param array $left
  * @param array $right
  *
  * @return void
  * @date 2018/11/21
  * @author yuanliandu <yuanliandu@qq.com>
  */
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
