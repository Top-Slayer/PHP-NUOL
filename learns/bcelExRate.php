<?php
$data = file_get_contents("https://www.bcel.com.la/bcel/home.html");
$pattern = '/<table id=\"fxRate\" [^>]*>(.*?)<\/table>/is';
preg_match($pattern, $data, $match);

$data = $match[1];
$pattern = '/<tr>(.*?)<\/tr>/is';
preg_match_all($pattern, $data, $match);

$data = $match[1];

array_shift($data);
array_pop($data);

foreach ($data as $k => $val) {
    $pattern = '/<td[^>]*>(.*?)<\/td>/is';
    preg_match_all($pattern, $val, $match);
    $img = $match[1][0];
    if (preg_match('/<img src=\"(.*?)\"/i', $img, $m)) {
        $img = "<img src=\"https://www.bcel.com.la$m[1]\">";
    }
    $match[1][0] = $img;
    $exRate[$k] = $match[1];
}
?>


<table border="1">
    <tr>
        <th>ສະກຸນເງິນ</th>
        <th>ອັດຕາຊື້</th>
        <th>ອັດຕາຂາຍ</th>
    </tr>

    <?php foreach ($exRate as $d) { ?>
        <tr>
            <td>
                <?php echo $d[0] ?> 
                <?php echo $d[1] ?> 
            </td>
            <td>
                <?php echo $d[2] ?> 
            </td>
            <td>
                <?php echo $d[3] ?> 
            </td>
        </tr>
    <?php } ?>
</table>