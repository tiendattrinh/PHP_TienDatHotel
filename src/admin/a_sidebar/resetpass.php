<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/admin_sidebar.css">
</head>

<body>
    <?php
    include '../../../database.php';
    $message = '';
    session_start();
    // print_r($_SESSION);  // Kiểm tra xem session có dữ liệu hay không(QUAN TRỌNG!!!!!!!)
    
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
    if (!isset($_SESSION['admin_id']) || !isset($_SESSION['admin_email']) || !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'admin') {
        // Nếu chưa đăng nhập hoặc không phải admin, chuyển hướng về login
        header("Location: login.php");
        echo ("Session ID: " . session_id());
        echo ("Session Data: " . print_r($_SESSION, true));
        exit;
    }

    $user_id = $_SESSION['admin_id'];
    $email = $_SESSION['admin_email'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $current_password = $_POST['password'];
        $new_password = $_POST['new-password'];
        $confirm_new_password = $_POST['confirm-new-password'];

        //kiểm mật khẩu hiện tại
        $stmt = $con->prepare("SELECT password FROM login WHERE id=? AND email=?");
        $stmt->bind_param("is", $user_id, $email);
        $stmt->execute();
        $stmt->bind_result($db_password);
        $stmt->fetch();
        $stmt->close();

        if ($db_password !== $current_password) {
            $message = "<i class='fas fa-times-circle' style='color: red;'></i> Current password is incorrect!";
        } elseif ($new_password !== $confirm_new_password) {
            $message = "<i class='fas fa-times-circle' style='color: red;'></i> New passwords do not match!";
        } elseif ($new_password === $db_password) {
            $message = "<i class='fas fa-times-circle' style='color: red;'></i> New password cannot be the same as the current password!";
        } else {
            // Cập nhật mật khẩu mới
            $stmt_update = $con->prepare("UPDATE login SET password = ? WHERE id = ? AND email = ?");
            $stmt_update->bind_param("sis", $new_password, $user_id, $email);

            if ($stmt_update->execute()) {
                $message = "<i class='fas fa-check-circle' style='color: green;'></i> <i style='color: green'>Password reset successfully!</i>";
            } else {
                $message = "<i class='fas fa-times-circle' style='color: red;'></i> Error: " . $stmt_update->error;
            }
            $stmt_update->close();
        }
    }
    ?>


    <div class="reset-container">
        <h2>Password Reset</h2>
        <p>Enter your New Password</p>

        <?php if (!empty($message)): ?>
            <p style="font-size: 16px"><?php echo $message; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group-rs">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" placeholder="Enter Password">
                    <i class="toggle-password"><i class="fas fa-eye-slash"></i></i>
                </div>
            </div>
            <div class="form-group-rs">
                <label for="password">New Password</label>
                <div class="input-wrapper">
                    <input type="password" id="new-password" name="new-password" placeholder="Enter New Password">
                    <i class="toggle-password"><i class="fas fa-eye-slash"></i></i>
                </div>
            </div>
            <div class="form-group-rs">
                <label for="confirm-password">Confirm New Password</label>
                <div class="input-wrapper">
                    <input type="password" id="confirm-new-password" name="confirm-new-password"
                        placeholder="Confirm New Password">
                    <i class="toggle-confirm-password"><i class="fas fa-eye-slash"></i></i>
                </div>
            </div>
            <button type="submit" class="btn-reset">Reset Password</button>
        </form>
        <div class="footer-rs">
            <p>Remembered your Password?</p>
            <a href="../admin.php">Back to Admin</a>
        </div>
    </div>

    <!-- script ẩn hiện password -->
    <script>
        // Lấy tất cả các toggle-password elements
        const togglePasswordIcons = document.querySelectorAll('.toggle-password, .toggle-confirm-password');
        togglePasswordIcons.forEach(icon => {
            icon.addEventListener('click', () => {
                // Xác định input liên quan
                const input = icon.previousElementSibling;
                const isPassword = input.type === 'password';
                // Chuyển đổi giữa password và text
                input.type = isPassword ? 'text' : 'password';
                // Thay đổi icon
                icon.innerHTML = isPassword
                    ? '<i class="fas fa-eye"></i>'
                    : '<i class="fas fa-eye-slash"></i>';
            });
        });
    </script>
</body>

</html>