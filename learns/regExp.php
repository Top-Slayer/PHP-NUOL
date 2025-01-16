<?php
// $message = "Please send me an email to abc@gmail.com";
// $pattern = '/([a-z0-9]+)@([a-z0-9]+)/';

$message = "Please call me: 020-99907099";
$pattern = '/\s[0-9]{3}-[0-9]{6,8}/';

if (preg_match($pattern, $message, $match)) {
    echo "found";
    echo "<pre>";
    print_r($match);
    echo "</pre>";
} else {
    echo "not found";
}
?>
