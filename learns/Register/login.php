<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
        }

        .login-container .form-control {
            border-radius: 25px;
            padding: 12px 20px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            box-shadow: none;
        }

        .login-container .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
        }

        .login-container .btn {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            color: #fff;
            padding: 12px 20px;
            border-radius: 25px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-container .btn:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }

        .login-container .forgot-password {
            display: block;
            margin-top: 15px;
            color: #6a11cb;
            text-decoration: none;
            font-size: 14px;
        }

        .login-container .forgot-password:hover {
            text-decoration: underline;
        }

        .login-container .signup-link {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .login-container .signup-link a {
            color: #6a11cb;
            text-decoration: none;
        }

        .login-container .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <a href="#" class="forgot-password">Forgot Password?</a>
            <div class="signup-link">
                Don't have an account? <a href="#">Sign Up</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (Optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>