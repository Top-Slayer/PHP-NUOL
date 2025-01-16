<?php
function convertKip2USD() {
    global $kip;
    $kip = $_GET['k'];
    $rate = $_GET['r'];
    return $kip * $rate;
}

$usd = convertKip2USD();
echo "ຈໍານວນເງິນ: $kip KIP<br>";
echo "ອັດຕາແລກປ່ຽນ: $_GET[r] KIP<br>";
echo "ເປັນເງິນ: $usd USD";
?>

<!-- Example: http://localhost/exercises/exchange_money/?k=100000&r=0000.4 -->