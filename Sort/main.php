<?php


/**
 * 从小到大
 * 两个相邻元素比较，若a>b 则交换位置
 */
 function BubbleSort(array $numbers) {
    $count = count($numbers);
    if(1 >= $count) return $numbers;


    for($i=0;$i<$count;$i++) {
        $flag =  false;
       for($j=0;$j<$count-$i-1;$j++) {
            if($numbers[$j] > $numbers[$j+1]) {
                $temp = $numbers[$j];
                $numbers[$j] =   $numbers[$j + 1];
                $numbers[$j+1] = $temp;
                $flag = true;
            }
       }
    // 优化：每次冒泡，至少发生一次交换，如果没有发生交换，则表示已满足大小关系，冒泡即可停止
       if(!$flag) break;
       
    }
    return $numbers;
}

/**
 * 从小到大
 * 比较，迁移位置
 * @param array $numbers
 *
 * @return void
 * @date 2018/11/19
 * @author yuanliandu <yuanliandu@qq.com>
 */
function InsertionSort(array $numbers) {
    $count = count($numbers);

    if(1 >= $count) return $numbers;

    for($i=1;$i<$count;$i++) {
        $value = $numbers[$i];//代表未排序区间
        $j = $i - 1;//代表已排序区间
        for(;$j>=0;$j--) {
            if($value < $numbers[$j]) {
                $numbers[$j+1] = $numbers[$j];
            }else {
                break;
            }
        }
        $numbers[$j+1] = $value;
    
    }
    return $numbers;
}

/**
 * 从小到大排序
 * 从中找到最小的交换，放到最前面的位置
 * @param array $numbers
 *
 * @return void
 * @date 2018/11/19
 * @author yuanliandu <yuanliandu@qq.com>
 */
function SelectionSort(array $numbers) {
    $count = count($numbers);
    if(1 >= $count) return $numbers;
    
    for($i=0;$i<$count;$i++) {
        
        $minIndex = $count-1;
        /**
         * 逆序查询
         * 找到未排序区间最小的元素
         * 并记录位置
         */
        for($j=$minIndex;$j>$i;$j--) {
            if($numbers[$minIndex] > $numbers[$j-1]) {
                $minIndex = $j-1;
            }
        }
       
        /**
         * 交换元素
         */
        $temp = $numbers[$i];
        $numbers[$i] = $numbers[$minIndex];
        $numbers[$minIndex] = $temp;
    } 
    return $numbers;
}
$numbers = [2,4,6,7,9,5,3,1,6];
// var_dump(BubbleSort($numbers));
var_dump(InsertionSort($numbers));
// var_dump(SelectionSort($numbers));
