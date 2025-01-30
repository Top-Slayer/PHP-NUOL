<?php
session_start();
$_SESSION['surname'] = $_POST['surname'] ?? '';
?>

<form method="post" action="final.php">
    <label>Phone: </label>
    <input type="text" name="phone"> <br>
        <input type="submit" value="login">
</form>