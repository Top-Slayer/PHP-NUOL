<?php
session_start();
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('Error! no paramater');
}

require_once('_config.php');
$users = [];
$sql = "SELECT * FROM users WHERE U_ID = ?";

$smt = $conn->prepare($sql);
$smt->bind_param('i', $_GET['id']);
$smt->execute();
$result = $smt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
   
} else {
    die("No data found!");
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="lo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">ແກ້ໄຂຂໍ້ມູນ</h1>
        <form id="createUserForm" action="save.php" method="post" class="card shadow p-4 w-50 w-sm-100 mx-auto">
            <input hidden name="uid" value="<?php echo $row['U_ID'] ?>">
            <div class="mb-3">
                <label for="fullname" class="form-label">ຊື່ແລະນາມສະກຸນ *</label>
                <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $row['full_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">ຊື່ບັນຊີຜູ້ໃຊ້ *</label>
                <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['user_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">ລະຫັດຜ່ານ</label>
                <input type="password" class="form-control" name="password" id="password" value="">
            </div>
            <div class="mb-3">
                <label for="repassword" class="form-label">ຢືນຢັນລະຫັດຜ່ານ</label>
                <input type="password" class="form-control" name="repassword" id="repassword" value="">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">ອີເມວ *</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">ເບີໂທ</label>
                <input type="tel" class="form-control" name="tel" id="tel" value="<?php echo $row['tel']; ?>">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">ປະເພດຜູ້ໃຊ້</label>
                <select class="form-select" name="role" id="role" required>
                    <option value="1" <?php echo $row['role']==1? "selected" : ""?>>User</option>
                    <option value="2" <?php echo $row['role']==2? "selected" : ""?>>Administrator</option>
                </select>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">ບັນທຶກ</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="script.js"></script>
</body>
</html>