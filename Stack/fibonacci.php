<?php
namespace Stack;

/**
 * 斐波那契数列
 * 如果兔子出生两个月后，就有繁殖能力；一对兔子每个月能生出一对兔子；
 * 假设兔子不死，一年以后能繁殖多少对兔子？
 * 0时，兔子 0
 * 第一个月 兔子 1；
 * 第二月 兔子 1； f(n-1) + f(n-2);
 * 第三个月 兔子 2； f(n-1) + f(n-2);
 * 第四个月 兔子 3； f(n-1) + f(n-2);
 * 第五个月 兔子 5； f(n-1) + f(n-2);
 * 里面存在重复计算，可以将重复计算的结果用散列记录下来；
 */

 /**
  * 递归实现
  * @param int $n
  *
  * @return void
  * @date 2018/11/05
  * @author yuanliandu <yuanliandu@qq.com>
  */
function fbiRecursive(int $n) {

    if(2 > $n) {
        return  $n==0 ? 0 : 1;
    }

    return fbiRecursive($n-1) + fbiRecursive($n-2);
}

/**
 * 迭代实现
 * @param [int] $n
 *
 * @return void
 * @date 2018/11/05
 * @author yuanliandu <yuanliandu@qq.com>
 */
function fbiIteration(int $n) {
    for($i=0;$i<=$n;$i++) {
        if($i<2) {
            $arr[$i] = $i; 
        }else {
            $arr[$i] = $arr[$i-1] + $arr[$i-2];
        }
        print($arr[$i]) . "\n";
    }
}
fbiIteration(6);
var_dump(fbiRecursive(6));
