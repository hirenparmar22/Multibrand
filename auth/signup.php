<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #111;
            color: white;
        }

        .signup-box {
            max-width: 500px;
            margin: 60px auto;
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

<div class="signup-box">

    <h3 class="text-center mb-4">Create Account</h3>

    <form action="../api/signup-process.php"
          method="POST"
          enctype="multipart/form-data">

        <!-- Full Name -->
        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>

        <!-- Username -->
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

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

        <!-- Confirm Password -->
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>

        <!-- Role -->
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="user">User</option>
                <option value="manager">Manager</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label>Profile Image</label>
            <input type="file" name="profile_image" class="form-control">
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-warning w-100">
            Sign Up
        </button>

    </form>

    <div class="text-center mt-3">
        <a href="/" class="text-warning">Already have account? Login</a>
    </div>

</div>

</body>
</html>