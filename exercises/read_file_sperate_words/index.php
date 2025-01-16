<?php
$myfile = fopen("data.txt", "r") or die("Not found");
$datas = fread($myfile,filesize("data.txt"));
list($name, $surname, $gmail, $phone) = explode(":", $datas);

echo "<b>Name: </b>". ucfirst($name) ." ". strtoupper($surname) ."<br>";
echo "<b>Email: </b> $gmail <br>";
echo "<b>Phone: </b> $phone </b><br>";

fclose($myfile);
?>
