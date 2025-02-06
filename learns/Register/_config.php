<?php
$servername = "localhost";
$dbusername = "root";
$password = "";
$dbname = "register_php";

$conn = new mysqli($servername, $dbusername, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>