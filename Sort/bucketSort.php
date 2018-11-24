<?php

require_once 'quickSort.php';

$numbers = [11,23,45,67,88,99,22,34,56,78,90,12,34,5,6];
$size = 10;
var_dump(bucketSort($numbers,10));


function bucketSort(array $numbers,$size) {
    $buckets = [];

    foreach($numbers as $key => $value) {
        $index = ceil($value/$size) - 1;
        $buckets[$index][] = $value;
        
    }

    $result = [];
   for($i=0;$i<$size;$i++) {
        $bucket = $buckets[$i];
       quickSort($bucket,0,count($bucket)-1);
       $result = array_merge($result,$bucket);
   }
   return $result;
}