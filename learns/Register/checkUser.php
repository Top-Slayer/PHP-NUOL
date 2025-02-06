<?php
header('Content-Type: application/json');

require_once('_config.php');

$sql = "SELECT * FROM users WHERE user_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_GET['user']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['result' => true]);
} else {
    echo json_encode(['result' => false]);
}
