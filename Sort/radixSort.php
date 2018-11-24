<?php


$numbers = [
    1234,
    4321,
    12,
    31,
    412,
];
$maxLength = 0;
foreach($numbers as $value) {
    $length = strlen((string)$value);
    if($maxLength < $length) {
        $maxLength = $length;
    }
}

for($i=1;$i<=$maxLength;$i++) {
    $children = [];
    foreach ($numbers as $key => $value) {
        $value = (string)$value;
        if($i > strlen($value)) {
            $children[] = 0;
        }else {
            $children[] = (int)substr($value,0-$i,1);
        }
    }
    var_dump($children);
}
