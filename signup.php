<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
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

        .signup-box {
            background: white;
            width: 400px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .signup-box h2 {
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

        .signup-btn {
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

        .signup-btn:hover {
            background: #1e3a8a;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: #1e3a8a;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="signup-box">
        <h2>Create Account</h2>

        <form action="signup-process.php" method="POST" enctype="multipart/form-data">
            
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="full_name" required>
            </div>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" required>
            </div>

            <div class="input-group">
                <label>Select Role</label>
                <select name="role" required>
                   
                    <option value="user">User</option>
                    <option value="manager">Manager</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="input-group">
                <label>Your Photo</label>
                <input type="file" name="profile_image" accept="image/*">
            </div>

            <button type="submit" class="signup-btn">Sign Up</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>

</body>
</html>