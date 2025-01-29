<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form</title>
    <link rel="stylesheet" href="../../../css/admin_sidebar.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <?php
    session_start();

    // Kiểm tra session timeout
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
        // Nếu quá 30 phút không hoạt động, hủy session và chuyển hướng
        session_unset();
        session_destroy();
        header("Location: a_sidebar/login.php");
        exit;
    }

    // Cập nhật thời gian hoạt động cuối cùng
    $_SESSION['last_activity'] = time();

    // Kiểm tra người dùng đã đăng nhập chưa
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'admin') {
        // Nếu chưa đăng nhập hoặc không phải admin, chuyển hướng về login
        header("Location: login.php");
        exit;
    }
    ?>
</head>

<body>
    <?php
    include '../../../database.php';

    $message_email = '';
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt_check = $con->prepare("SELECT id FROM login WHERE email = ?");
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            $message_email = "Email already exists. Please use another email.";
        } else {

            // Sử dụng Prepared Statements
            $stmt = $con->prepare("INSERT INTO login (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $password);

            if ($stmt->execute()) {
                $message = "<i class='fas fa-check-circle'></i> Account created successfully!";
            } else {
                $message = "Error: " . $stmt->error;
            }

            $stmt->close();
        }
        $stmt_check->close();
    }
    ?>

    <div class="login-container">
        <div class="left-re"></div>
        <div class="right">
            <h2>Create Account</h2>
            <p>Go back <a href="../admin.php">Admin</a> or <a href="login.php">Login</a></p>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    <?php if ($message_email): ?>
                        <p style="color: red; padding-top:5px"><?php echo htmlspecialchars($message_email); ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <a class="toggle-password" onclick="togglePassword()">Show Password</a>
                </div>
                <?php if ($message): ?>
                    <p style="color: green; font-size:16px"><?php echo $message; ?></p>
                <?php endif; ?>
                <button type="submit" class="btn-login">Create Account</button>
            </form>

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