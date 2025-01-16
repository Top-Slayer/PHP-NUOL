<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form method="POST">
        <label for="name">User name:</label>
        <input type="text" id="name" name="name"><br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass"><br>

        <label for="re-pass">Re-Password:</label>
        <input type="password" id="re-pass" name="re-pass"><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['pass']);
    $re_pass = htmlspecialchars($_POST['re-pass']);

    if ($re_pass != $pass) {
        echo "Not macthed";
        exit;
    }

    $readfile = fopen("data.txt", "r") or die("Can't created");

    while (($line = fgets($readfile)) !== false) {
        list($r_name, $r_pass) = explode(":", $line);
        if ($name == $r_name && $pass == $r_pass) {
            echo "Already register";
            exit;
        }
    }

    $addfile = fopen("data.txt", "a") or die("Can't created");

    fwrite($addfile, "$name:$pass\n");

    fclose($addfile);
    fclose($readfile);
}
?>