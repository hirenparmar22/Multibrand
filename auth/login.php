<?php
session_start();

if (!empty($_SESSION['user_id'])) {
    header('Location: /index.php');
    exit;
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #111827, #1e3a8a);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: white;
            width: 400px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 15px;
        }

        .login-btn {
            width: 100%;
            background: #111827;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .login-btn:hover {
            background: #1e3a8a;
        }

        .signup-link {
            text-align: center;
            margin-top: 15px;
        }

        .signup-link a {
            color: #1e3a8a;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>Login</h2>

        <form action="/api/login-process.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">  
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>


            <button type="submit" class="login-btn">Login</button>
        </form>
        <div style="margin-top:10px; text-align:center;">
            <a href="forgot-password.php">Forgot Password?</a>
        </div>
        <div class="signup-link">
            Don't have an account? <a href="signup.php">Sign Up</a>
        </div>
    </div>

</body>

</html>