<?php
$odd_percent = 0;
$even_percent = 0;
$max_loop = 1000000;

for ($i = 0; $i <= $max_loop; $i++) {
    $x = rand(0, 100000);
    // echo $x . " ແມ່ນເລກ: " . (($x % 2) ? "ຄິກ" : "ຄູ່");
    // echo "<br>";
    $x % 2 ? $odd_percent++ : $even_percent++;
}

echo "Odd: ". $odd_percent * 100 / $max_loop .' %'. "<br>" ."Even: ". $even_percent * 100 / $max_loop .' %';

?>