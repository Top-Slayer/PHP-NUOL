<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("request method is invalid");
}

$user = htmlspecialchars(trim($_POST['username'] ?? ''));
$pass = htmlspecialchars(trim($_POST['password'] ?? ''));

if ($user=='root' && $pass=='123456') {
    echo 'Login successful';
} else {
    header("Location: index.php");
}