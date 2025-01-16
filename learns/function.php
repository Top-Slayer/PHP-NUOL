<?php

function power($x, $y) {
    return $x ** $y;
}

function ploty($x) {
    return 2 * power($x, 2) + (4 * $x) - 1;
}

function arrayPloyY($arr) {
    $arr_temp = [];
    foreach ($arr as $i => $e) {
        $arr_temp[$i] = ploty($e);
    }
    return $arr_temp;
}

$x = [1,2,3,4,5,6,7,8,9];
$y = arrayPloyY($x);

echo "<pre>";
print_r($y);
echo "</pre>";

?>