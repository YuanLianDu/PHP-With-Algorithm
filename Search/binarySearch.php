<?php

$numbers = [0, 1, 2, 3, 3, 4, 5, 6, 7, 9];
$find = 1;
var_dump(binarySearch($numbers,$find));die();

/**
 * 二分查找订单
 * @param array $numbers
 * @param [type] $find
 *
 * @return void
 * @date 2018/11/26
 * @author yuanliandu <yuanliandu@qq.com>
 */
function binarySearch(array $numbers, $find)
{
    $low = 0;
    $high = count($numbers) - 1;
    return search($numbers, $low, $high, $find);
}

function search(array $numbers, $low, $high, $find)
{
    /**
     * notice1 循环退出条件
     */
    if ($low > $high) {
        return -1;
    }

    /**
     * notice2 mid计算
     */
    $mid = $low + (($high - $low) >> 2);
    if ($numbers[$mid] > $find) {
        //notice3 high值更新
        return search($numbers, $low, $mid -1, $find);
    } elseif ($numbers[$mid] < $find) {
        //notice4 low值更新
        return search($numbers, $mid + 1, $high, $find);
    } else {
        return $mid;
    }
}

/**
 * 求数字的平方根，保留6位小数
 * @param [type] $number
 *
 * @return void
 * @date 2018/11/26
 * @author yuanliandu <yuanliandu@qq.com>
 */
function squareRoot($number)
{
    if ($number < 0) {
        return  -1;
    } elseif ($number < 1) {
        $min = $number;
        $max = 1;
    } else {
        $min = 1;
        $max = $number;
    }
    $mid = $min + ($max - $min) / 2;
    while (getDecimalPlaces($mid) < 6) {
        $square = $mid * $mid;
        if ($square > $number) {
            $max = $mid;
        } elseif ($square == $number) {
            return $mid;
        } else {
            $min = $mid;
        }
        $mid = $min + ($max - $min) / 2;
    }
    return $mid;
}

function getDecimalPlaces($number)
{
    $temp = explode('.', $number);
    return strlen($temp[1]);
}

var_dump(squareRoot(3));die();
