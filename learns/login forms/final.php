<?php
session_start();
$phone = $_POST['phone'] ?? '';
$surname = $_SESSION['surname'];
$username = $_SESSION['username'];
?>

<h1>
    <p>Username: <?php echo htmlspecialchars($username) ?> </p>
    <p>Surname: <?php echo htmlspecialchars($surname) ?> </p>
    <p>Phone: <?php echo htmlspecialchars($phone) ?> </p>
</h1>