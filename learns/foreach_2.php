<?php

function findLongestLength($arr)
{
    $res = 0;
    $temp = null;
    foreach ($arr as $i => $e) {
        $lenght = count($e);
        if ($lenght > $temp) {
            $res = $i;
        }
        $temp = $lenght;
    }
    return $res;
}

$datas = [
    ['name' => 'Santi', 'phone' => '888', 'email' => 'santi@.com', 'age' => 20],
    ['name' => 'Chee', 'phone' => '000', 'email' => 'chee@.com', 'age' => 20, 'asd' => 'asda'],
    ['name' => 'Teng', 'phone' => '123', 'email' => 'teng@.com', 'age' => 20, 'sg'],
    ['name' => 'Santi', 'phone' => '888',],
];

$colNames = array_keys($datas[findLongestLength($datas)]);

// echo "<pre>";
// print_r($datas);
// echo "</pre>";

?>

<!-- foreach loop -->
<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>No.</th>
        <?php foreach ($colNames as $c) { ?>
            <th> <?php echo $c ?> </th>
        <?php } ?>
    </tr>

    <?php foreach ($datas as $i => $data) { ?>
        <tr>
            <td> <?php echo $i + 1 ?> </td>
            <?php foreach ($colNames as $index => $colName) { ?>
                <td> <?php echo isset($data[$colName]) ? $data[$colName] : '' ?> </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>