<?php
$num = 100;

function isPrime($n) {
    if ($n <= 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i === 0) {
            return false; 
        }
    }

    return true;
}

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

for ($i = 0; $i <= $num; $i++) {
    if (isPrime($i)) {
        echo fib($i) . ", ";
    }
}
