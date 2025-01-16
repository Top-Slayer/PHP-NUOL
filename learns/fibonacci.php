<?php
$strat_time = microtime(true);

$storage = array();
$input = 40;

function fibonacci($n)
{
    if ($n <= 1) {
        return $n;
    }

    if (isset($storage[$n])) {
        return $storage[$n];
    }

    return fibonacci($n - 1) + fibonacci($n - 2);
}


for ($i = 0; $i < $input; $i++) {
    echo fibonacci($i) . " ";
}

$end_time = microtime(true);
$execute_time = $end_time - $strat_time;
echo "Execute time: " . $execute_time;