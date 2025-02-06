<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: user_management.php');
    exit;  
}

$uid = $_POST['uid'] ?? '';
$fullname = $_POST['fullname'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$repassword = $_POST['repassword'] ?? '';
$email = $_POST['email'] ?? '';
$tel = $_POST['tel'] ?? '';
$role = $_POST['role'] ?? 1;

require_once('_config.php');

$sql = "UPDATE users SET
            full_name=?,
            user_name=?,
            email=?,
            tel=?,
            role=?,
            modified_at=now()
        WHERE U_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssii', $fullname, $username, $email, $tel, $role, $uid);

if (!empty($password) && $password === $repassword) {
    $sql1 = "UPDATE users SET password=SHA1(?) WHERE U_ID = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param('si', $password, $uid);
    $stmt1->execute();
}

if ($stmt->execute()) {
    header('Location: user_management.php');
    exit;  
} else {    
    echo "Error: " . $stmt->error;
}