<?php
session_start();
$_SESSION['username'] = $_POST['username'] ?? '';
?>

<form method="post" action="step_3.php">
    <label>Surname: </label>
    <input type="text" name="surname"> <br>
        <input type="submit" value="login">
</form>