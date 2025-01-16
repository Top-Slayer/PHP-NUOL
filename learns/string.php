<?php
$text = "ສະບາຍດີ";
$gmail = "dragontops55@gmail.com";
$data = "khamkeo:khmakeo@gmail.com:24242:13/02/200";

echo "ASCII lengths: ";
echo strlen($text). "<br>";

echo "UNICODE lengths: ";
echo mb_strlen($text). "<br>";

echo "<hr>";

// Find index of '@'
echo strpos($gmail, '@');

echo "<hr>";

// Get only domain 
echo substr($gmail, strpos($gmail, "@") + 1);

echo "<hr>";

echo "User: ";
echo substr($gmail, 0, strpos($gmail, "@"));
echo "<br>";
echo "Domain: ";
echo substr($gmail, strpos($gmail, "@") + 1);

echo "<hr>";

list($user, $domain) = explode("@", $gmail);
echo "User: " .$user. "<br>";
echo "Domain: " .$domain. "<br>";

echo "<hr>";

$arr = explode(":", $data);
echo "<pre>";
print_r($arr);
echo "</pre>";

echo "<hr>";

echo implode("--", $arr);

echo "<hr>";
?>