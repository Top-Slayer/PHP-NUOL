<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: user_management.php');
    exit;
}

$fullname = $_POST['fullname'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$repassword = $_POST['repassword'] ?? '';
$email = $_POST['email'] ?? '';
$tel = $_POST['tel'] ?? '';
$role = $_POST['role'] ?? 1;

if (empty($password) || $password !== $repassword) {
    die('Password not matched.');
}

require_once('_config.php');

$sql = "INSERT INTO users(U_ID, full_name, user_name, password, email, tel, role) 
        VALUES(
        (
            SELECT COALESCE(MIN(t1.U_ID + 1), MAX(t2.U_ID) + 1, 1) 
            FROM users t1 
            LEFT JOIN users t2 ON t1.U_ID + 1 = t2.U_ID 
            WHERE t2.U_ID IS NULL
        ),
        ?, ?, SHA1(?), ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('sssssi', $fullname, $username, $password, $email, $tel, $role);

if ($stmt->execute()) {
    header('Location: user_management.php');
    exit;
} else {
    echo "Error: " . $stmt->error;
}
