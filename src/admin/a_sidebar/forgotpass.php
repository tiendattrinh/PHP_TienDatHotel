<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Pass Form</title>
    <link rel="stylesheet" href="../../../css/admin_sidebar.css">
</head>

<body>
    <?php
    include '../../../database.php';

    $message_fg = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = trim($_POST['email']);

        // Kiểm tra email trong database
        $stmt = $con->prepare("SELECT id FROM login WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Tạo mã ngẫu nhiên 4 ký tự
            $random_code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 4);

            // Cập nhật mã vào database
            $stmt_update = $con->prepare("UPDATE login SET password = ? WHERE email = ?");
            $stmt_update->bind_param("ss", $random_code, $email);
            $stmt_update->execute();

            // Gửi mã qua email
            $to = $email;
            $subject = "Password Recovery Code";
            $message = "Your recovery code is: " . $random_code;
            $headers = "From: tiendathotel@gmail.com";

            if (mail($to, $subject, $message, $headers)) {
                $message_fg = "<p style='color: #green'; font-size: 16px;>A recovery code has been sent to your email.</p>";
            } else {
                $message_fg = "<p style='color: #ff0b29'; font-size: 16px;>Failed to send the recovery code. Please try again.</p>";
            }
        } else {
            $message_fg = "<p style='color: #ff0b29'; font-size: 16px;>The email you entered does not exist.</p>";
        }
    }
    ?>
    <div class="forgot-container">
        <div class="left-forgot"></div>
        <div class="right-forgot">
            <h2>Forgot Password</h2>

            <?php if (!empty($message_fg)): ?>
                <p><?php echo $message_fg; ?></p>
            <?php endif; ?>

            <p>Go back <a href="../admin.php">Admin</a> or <a href="login.php">Login</a></p>
            <form method="POST" action="">
                <div class="form-group-forgot">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <button type="submit" class="btn-forgot">Recover password</button>
            </form>
        </div>
    </div>
</body>

</html>