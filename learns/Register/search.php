<?php
// if ($_SERVER['REQUEST_METHOD'] != 'POST') {
//     header('Location: user_management.php');
//     exit;  
// }

$ts = $_POST['text_search'];

require_once('_config.php');

$sql = "SELECT * FROM users 
          WHERE full_name LIKE ?
          OR user_name LIKE ?";

$stmt = $conn->prepare($sql);
$ts = '%' . $ts . '%';
$stmt->bind_param('ss', $ts, $ts);
$stmt->execute();
$result = $stmt->get_result();
$row = [];

if ($result->num_rows > 0) {
    while ($row[] = $result->fetch_assoc());
    array_pop($row);
}
echo "<pre>";
print_r($row);


mysqli_close($conn);
