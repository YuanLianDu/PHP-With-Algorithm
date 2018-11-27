<?php

$numbers = [0, 1, 2, 3, 3, 4, 5, 6, 7, 9];
$find = 1;
// var_dump(binarySearch($numbers,$find));die();

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
    $mid = $low + (($high - $low) >> 1);
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

// var_dump(squareRoot(3));die();

$numbers = [1,2,3,3,3,4,5,6,8,11,13];
$find = 3;
// var_dump(findLastLessEqual($numbers,$find));
/**
 * 找到第一个=value的元素
 * @param array $numbers
 *
 * @return void
 * @date 2018/11/27
 * @author yuanliandu <yuanliandu@qq.com>
 */
function findFirstEqual(array $numbers,$find) {
    $length = count($numbers);
    $low = 0;
    $high = $length - 1;
    while($low <= $high) {
        $mid = $low + (($high-$low)>>1);
        if($numbers[$mid] > $find) {
            $high = $mid - 1;
        }else if($numbers[$mid] < $find) {
            $low = $mid + 1;
        }else {
            /**
             * 如果是第一个元素，或之前一个元素不等于我们要找的值
             * 我们就找到了第一个=find的element
             */
            if($mid==0 || $numbers[$mid-1]!=$find) {
                return $mid;
            }else {
                $high = $mid - 1;
            }
        }
    }

    return -1;
}

/**
 * 找到最后一个=find的元素
 * @param array $numbers
 * @param [type] $find
 *
 * @return void
 * @date 2018/11/27
 * @author yuanliandu <yuanliandu@qq.com>
 */
function findLastEqual(array $numbers,$find) {
    $length = count($numbers);
    $low = 0;
    $high = $length - 1;
    while($low <= $high) {
        $mid = $low + (($high-$low)>>1);
        if($numbers[$mid] > $find) {
            $high = $mid - 1;
        }else if($numbers[$mid] < $find) {
            $low = $mid + 1;
        }else {
            /**
             * 如果mid是最后一个元素的index
             * 或mid后一个元素!=我们要找的值
             * 则找到了最后一个=find的value
             */
            if($mid==$length-1 || $numbers[$mid+1]!=$find) {
                return $mid;
            }else {
                $low = $mid + 1;
            }
        }
    }

    return -1;
}

/**
 * 找到第一个大于等于find的元素
 * @param array $numbers
 * @param [type] $find
 *
 * @return void
 * @date 2018/11/27
 * @author yuanliandu <yuanliandu@qq.com>
 */
function findFirstGreaterEqual(array $numbers,$find) {
    $length = count($numbers);
    $low = 0;
    $high = $length - 1;
    while($low <= $high) {
        $mid = $low + (($high-$low)>>1);
        if($numbers[$mid] >= $find) {
            if ($mid == 0 || $numbers[$mid-1] < $find) {
                return $mid;
            }else {
                $high = $mid - 1;
            }
        }else  {
            $low  = $mid + 1;
        }
    }
    return -1;
}

/**
 * 找到最后一个小于等于find的元素
 * @param array $numbers
 * @param [type] $find
 *
 * @return void
 * @date 2018/11/27
 * @author yuanliandu <yuanliandu@qq.com>
 */
function findLastLessEqual(array $numbers,$find) {
    $length = count($numbers);
    $low = 0;
    $high = $length - 1;
    while($low <= $high) {
        $mid = $low + (($high-$low)>>1);
        if($numbers[$mid] <= $find) {
           if($mid==$length-1 || $numbers[$mid+1]> $find) {
               return $mid;
           }
           $low = $mid + 1;
        }else  {
            $high = $mid - 1;
        }
    }
    return -1;
}


$numbers = [9,10,1,2,3,4,5,6,7,8];
$find = 8;

var_dump(searchCircularArray($numbers,$find));die();

/**
 * 循环数组中找指定元素
 * @param array $numbers
 * @param [type] $find
 *
 * @return void
 * @date 2018/11/27
 * @author yuanliandu <yuanliandu@qq.com>
 */
function searchCircularArray(array $numbers,$find) {
    $length = count($numbers);
    $low = 0;
    $high = $length - 1;

    while($low <= $high) {
        $mid = $low + (($high-$low)>>1);
        if($numbers[$mid] === $find) {
            return $mid;
        }

        if($numbers[$low] > $numbers[$mid]) {
            // 后半部分是有序数组
           if(($numbers[$mid] < $find) && ($numbers[$high] >= $find)) {
               if($numbers[$high] === $find)  return $high;
                //在后半个区间内
                $low = $mid + 1;
           }else {
               $high = $mid - 1;
           }
        }else {
           // 
           if(($numbers[$low] <= $find) && ($numbers[$mid] > $find)) {
               if($numbers[$low] === $find)  return $low;
               $high = $mid - 1;
           }else {
               $low = $mid + 1;
           }
        }
        
    }
    return -1;
}