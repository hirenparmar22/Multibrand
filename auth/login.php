<?php
// session_start();
include __DIR__ . '/../config.php';

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #111;
            color: white;
        }

        .login-box {
            max-width: 450px;
            margin: 100px auto;
            background: #161616;
            padding: 30px;
            border-radius: 18px;
            border: 1px solid #2a2a2a;
        }

        .form-control {
            background: #222;
            border: 1px solid #333;
            color: white;
        }

        .form-control:focus {
            background: #222;
            color: white;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h3 class="text-center mb-4">Login</h3>

    <form method="POST" action="../api/login-process.php">

        <!-- Email -->
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <!-- Remember -->
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">Remember Me</label>
        </div>

        <!-- Button -->
        <button class="btn btn-warning w-100">Login</button>

    </form>

    <!-- Links -->
    <div class="text-center mt-4">

        <a href="forgot-password.php" class="text-warning text-decoration-none">
            Forgot Password?
        </a>

        <br><br>

        <span style="color:#aaa;">Don't have an account?</span>

        <a href="signup.php" class="text-warning text-decoration-none">
            Signup
        </a>

    </div>

</div>


<script>
setTimeout(() => {
    let alert = document.querySelector('.alert');
    if(alert){
        alert.style.display = 'none';
    }
}, 3000);
</script>

</body>
</html>