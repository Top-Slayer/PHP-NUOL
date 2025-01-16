<?php
$num = 100;
$storage = array();

function fib($n, &$mem=array())
{
    if ($n === 0) {
        return 0;
    }
    if ($n === 1) {
        return 1;
    }

    if (isset($mem[$n])) {
        return $mem[$n];
    }

    $mem[$n] = fib($n - 1, $mem) + fib($n - 2, $mem);
    return $mem[$n];
}

for ($i = 5; $i <= $num; $i++) {
    echo fib($i) . ", ";
}
