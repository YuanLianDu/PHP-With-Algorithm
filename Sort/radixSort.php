<?php

/**
 * 基数排序
 */
$numbers = [
    1234,
    4321,
    12,
    31,
    412,
];
$max = (string) max($numbers);
$loop =  strlen($max);

for($i=0;$i<$loop;$i++) {
    radixSort($numbers,$i);
}

function radixSort(array &$numbers,$loop) {

    $divisor = pow(10,$loop);
    $arr = (new \SplFixedArray(10))->toArray();
    foreach ($numbers as $key => $value) {
        $index = ($value/$divisor)%10;
        $arr[$index][] = $value;
    }
    $k=0;
    for($i=0;$i<10;$i++) {
        while(count($arr[$i]) > 0) {
            $numbers[$k++] = array_shift($arr[$i]);
        }
    }
}
