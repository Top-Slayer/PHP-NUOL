<?php
session_start();
require_once('_config.php');
$sql = "SELECT
    u.U_ID,
    u.full_name,
    u.user_name,
    u.password,
    u.email,
    u.tel,
    r.name as roleName,
    u.created_at
    FROM users as u LEFT JOIN roles as r ON u.role = r.R_ID";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
print_r($result->fetch_assoc());

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User management page</title>
    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&family=Oleo+Script:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Noto Sans Lao', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border: none;
        }

        .table tbody td {
            padding: 12px;
            border-bottom: 1px solid #e9ecef;
            background-color: #fff;
            color: #333;
        }

        .table tbody tr:hover {
            background-color: #f1f3f5;
            transition: background-color 0.3s ease;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table tbody tr:nth-child(even):hover {
            background-color: #e9ecef;
        }

        .table tbody td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .table tbody td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>User Management</h1>

        <div class="d-flex justify-content-between">
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createUserModal">
                + ເພີ່ມບັນຊີໃໝ່
            </button>

            <div class="d-flex align-items-center">
                <form action="search.php" method="post">
                    <input class="rounded border border-info p-2 me-3" type="text" name="text_search">
                    <button class="btn btn-success" type="submit"> ຄົ້ນຫາ ? </button>
                </form>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>U_ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Optional</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user_data) { ?>
                    <tr>
                        <td> <?php echo htmlspecialchars($user_data['U_ID']) ?> </td>
                        <td> <?php echo htmlspecialchars($user_data['full_name']) ?> </td>
                        <td> <?php echo htmlspecialchars($user_data['user_name']) ?> </td>
                        <td> <?php echo htmlspecialchars($user_data['password']) ?> </td>
                        <td> <?php echo htmlspecialchars($user_data['email']) ?> </td>
                        <td> <?php echo htmlspecialchars($user_data['tel']) ?> </td>
                        <td> <?php echo htmlspecialchars($user_data['roleName']) ?> </td>
                        <td> <?php echo htmlspecialchars($user_data['created_at']) ?> </td>
                        <td>
                            <a href="edit.php?id=<?php echo $user_data['U_ID'] ?>" class="btn btn-primary"> Edit </a>
                            <a href="delete.php?id=<?php echo $user_data['U_ID'] ?>" class="btn btn-danger"> Delete </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">ສ້າງບັນຊີຜູ້ໃຊ້ໃໝ່</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createUserForm" action="createuser.php" method="post">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">ຊື່ແລະນາມສະກຸນ *</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">ຊື່ບັນຊີຜູ້ໃຊ້ *</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <div class="d-none alert alert-danger" id="usernameError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">ລະຫັດຜ່ານ *</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="repassword" class="form-label">ຢືນຢັນລະຫັດຜ່ານ *</label>
                            <input type="password" class="form-control" id="repassword" name="repassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">ອີເມວ</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">ເບີໂທ</label>
                            <input type="tel" class="form-control" id="tel" name="tel">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">ປະເພດຜູ້ໃຊ້</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="1">User</option>
                                <option value="2">Administrator</option>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">ສ້າງໃໝ່</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!-- Bootstrap JS (Optional, for interactive components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Custom JS -->

<script>
    $(document).ready(function() {
        $('#username').on('change', function() {
            let user = $(this).val();
            $.get('checkUser.php?user=' + user, function(data) {
                console.log(data);
                if (data.result) {
                    $('#usernameError').addClass('is-invalid');
                    $('#usernameError').text('this username\'s already used').removeClass('d-none');
                } else {
                    $('#usernameError').addClass('is-invalid');
                    $('#usernameError').addClass('d-none');
                }
            });
        });
    });

    $('#createUserForm').on('submit', function(e) {
        if ($('#username').hasClass('is-invalid')) {
            e.preventDefault();
        }
    });
</script>