<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../../../css/admin_sidebar.css">

    <?php
    session_start();
    // Hủy session
    session_unset();
    session_destroy();
    ?>

    <?php
    // Kết nối tới cơ sở dữ liệu
    require_once '../../../database.php';

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        // Truy vấn kiểm tra email và mật khẩu
        $query_email = "SELECT * FROM login WHERE email = '$email'";
        $result_email = mysqli_query($con, $query_email);

        if (mysqli_num_rows($result_email) > 0) {
            // Nếu email tồn tại, kiểm tra mật khẩu
            $user = mysqli_fetch_assoc($result_email);

            if ($password === $user['password']) {
                // Lưu thông tin người dùng vào session
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_email'] = $user['email'];
                $_SESSION['admin_name'] = $user['name'];

                $_SESSION['logged_in'] = true;
                $_SESSION['role'] = 'admin';

                // Chuyển hướng đến trang admin
                header('Location: ../admin.php');
                exit;
            } else {
                // Nếu mật khẩu sai
                $error = "Wrong password.";
            }
        } else {
            $error = "Email does not exist.";
        }
    }
    ?>
</head>

<body>
    <div class="login-container">
        <div class="left"></div>
        <div class="right">
            <h2>Welcome Admin!</h2>
            <p>You can register a new administrator! <a href="register.php">Sign up</a></p>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <?php if (isset($error)): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <a class="toggle-password" onclick="togglePassword()">Show Password</a>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>

            <div class="forgot-password">
                <a href="forgotpass.php">Forgot password?</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleText = document.querySelector('.toggle-password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleText.textContent = 'Hide Password';
            } else {
                passwordInput.type = 'password';
                toggleText.textContent = 'Show Password';
            }
        }
    </script>
</body>

</html>