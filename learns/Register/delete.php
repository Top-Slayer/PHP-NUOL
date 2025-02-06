<?php
session_start();
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('Error! no paramater');
}

$uid = $_GET['id'] ?? '';

require_once('_config.php');

$sql = "DELETE FROM users WHERE U_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $uid);

if ($stmt->execute()) {
    header('Location: user_management.php');
    exit;
} else {
    echo "Error: " . $stmt->error;
}