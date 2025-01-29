<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <title>Admin TD Hotel</title>
    <link rel="stylesheet" href="../../css/admin.css?v=<?php echo time(); ?>">

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
        header("Location: a_sidebar/login.php");
        exit;
    }
    ?>

    <?php
    include '../../database.php';
    ?>
</head>

<body>
    <div class="sidebar">
        <div class="logo">TD Hotel</div>
        <button class="close-btn"><i class="fa-regular fa-circle-xmark"></i></button>
        <ul class="menu">
            <li class="menu-item active"><a href="admin.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <!-- <li class="menu-item"><a href="#"><i class="fa-regular fa-credit-card"></i> Payment</a></li> -->
            <!-- in hóa đơn trạng thái thành công -->
            <p class="menu-title">Account Settings</p>
            <li class="menu-item"><a href="a_sidebar/login.php"><i class="fas fa-sign-in-alt"></i> Log out</a></li>
            <li class="menu-item"><a href="a_sidebar/register.php"><i class="fas fa-user-plus"></i> Register</a></li>
            <li class="menu-item"><a href="a_sidebar/forgotpass.php"><i class="fa-solid fa-user-lock"></i> Forgot
                    Password</a>
            </li>
            <li class="menu-item"><a href="a_sidebar/resetpass.php"><i class="fa-solid fa-unlock-keyhole"></i> Reset
                    Password</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header class="header">
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="header-detail">
                <!-- <li><a href="#"><i class="fas fa-moon"></i></a></li> -->
                <li><a href="#"><i class="fas fa-sun"></i></a></li>
                <li><a href="#"><i class="fas fa-bell"></i></a></li>
                <li><a href="#"><i class="fas fa-user-circle"></i></a></li>
            </div>
        </header>

        <div class="overlay"></div> <!-- Để bấm ra ngoài đóng sidebar -->

        <section class="intro">
            <div class="intro-detail">
                <div class="info-detail">
                    <div class="welcome">Wellcome Dat! 🎉</div>
                    <div class="info">Hope you have a productive.👏 Check your new raising badge in your profile.</div>
                    <a href="/"><button class="view-badges">Back User</button></a>
                </div>
                <div class="img-intro">
                    <img src="../../images/admin-light.png" alt="IMG">
                </div>
            </div>
            <div class="stats">
                <!-- Phần hiển thị tổng doanh thu/user/contact -->
                <?php
                // Tính tổng doanh thu/user/contact
                $total_revenue = 0;
                $total_booking = 0;
                $total_contact = 0;

                // Truy vấn dữ liệu từ bảng roombook
                $sql = "SELECT id, pay, status FROM roombook";
                $result = $con->query($sql);

                // Truy vấn dữ liệu từ bảng contact
                $sql = "SELECT id FROM contact";
                $resultct = $con->query($sql);
                // Kiểm tra và tính tổng doanh thu
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $total_booking++;
                        if ($row['status'] === 'Completed') {
                            $total_revenue += $row['pay'];
                        }
                    }
                }
                if ($resultct->num_rows > 0) {
                    while ($row = $resultct->fetch_assoc()) {
                        $total_contact++;
                    }
                }
                ?>
                <div class="stat-box color-r"><i
                        class="fas fa-wallet"></i>Revenue<br><span>$<?php echo "$total_revenue" ?></span>
                </div>
                <div class="stat-box color-r"><i
                        class="fas fa-users"></i>Client<br><span><?php echo "$total_booking" ?></span></div>
                <div class="stat-box color-c"><i
                        class="far fa-id-card"></i>Contact<br><span><?php echo "$total_contact" ?></span></div>
                <div class="stat-box color-c"><i class="fab fa-servicestack"></i>Service<br><span>146</span></div>
            </div>
        </section>

        <section class="orders">
            <div class="orders-header">
                <h2>Booking Status</h2>
                <input class="filter-search" type="text" id="search-input" placeholder="Search by name..." />
            </div>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Client</th>
                        <th>Email</th>
                        <th>Room</th>
                        <th>Guest</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Status</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Truy vấn dữ liệu từ bảng roombook
                    $sql = "SELECT id, name, email, phone, room_name, guest, meal, arrival, departure, total_day, pay, status, note FROM roombook ORDER BY id DESC";
                    $result = $con->query($sql);

                    // Kiểm tra và hiển thị dữ liệu
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr data-info='" . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . "'>";
                            echo "<td>#{$row['id']}</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['room_name']) . "</td>";
                            echo "<td>{$row['guest']}</td>";
                            echo "<td>" . htmlspecialchars($row['arrival']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['departure']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                            echo "<td>
                    <i class='fas fa-info-circle view-info'></i>
                    <i class='fas fa-check-square hd-check-booking'></i> |
                     <i class='fas fa-trash delete-btn' data-id='{$row['id']}'></i>
                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No bookings available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Modal Update Status-->
        <div id="statusModal" class="modalstt">
            <div class="modal-contentstt">
                <h3>Update Status</h3>
                <select id="statusSelect">
                    <option value="Pending">Pending</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Unpaid">Unpaid</option>
                    <option value="Paid">Paid</option>
                    <option value="Completed">Completed</option>
                </select>
                <button id="saveStatusBtn">Save</button>
                <button id="closeModalstt">Cancel</button>
            </div>
        </div>


        <!-- Modal booking detail-->
        <div id="infoModal" class="modal">
            <div class="modal-content">
                <span class="close-btn-booking">&times;</span>
                <h3>Booking Details <?php $id ?></h3>
                <table class="modal-table">
                    <tbody id="modal-details">
                        <!-- Dữ liệu sẽ được chèn qua JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>


        <footer class="footer">
            <div class="todo-list">
                <h3>Todo List <i class="fas fa-plus-circle" id="openModal"></i></h3>
                <ul id="taskList">
                    <!-- <li>
                        <input type="checkbox">
                        <span>Lorem ipsum is dummy text of the printing sfweu fwiefh owiefhowieg weoi</span>
                        <span class="time">10:00 AM <i class="fas fa-trash"></i></span>
                    </li>-->
                </ul>
            </div>

            <!-- Modal add note-->
            <div id="addnote" class="modal_add_note">
                <div class="modal-content-add-note">
                    <h3>ADD NOTE</h3>
                    <div>
                        <input type="text" id="taskText" placeholder="Task description">
                        <input type="time" id="taskTime">
                    </div>
                    <button id="addNoteBtn">ADD</button>
                    <button id="closeModal_addNote">Cancel</button>
                </div>
            </div>

            <div class="send-message">
                <div class="orders-header">
                    <h2>Contact</h2>
                    <button class="filter" id="filter-button">
                        <i class="fas fa-sort"></i>
                    </button>
                </div>
                <div id="orders-table-container" class="table-contact">
                    <!-- Bảng sắp xếp giảm dần (DESC) -->
                    <table class="orders-table-contact" id="table-desc">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Request Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Truy vấn dữ liệu giảm dần
                            $sql_desc = "SELECT id, name, email, phone, message, date, status FROM contact ORDER BY id DESC";
                            $result_desc = $con->query($sql_desc);

                            if ($result_desc->num_rows > 0) {
                                while ($row = $result_desc->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>#{$row['id']}</td>";
                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                    echo "<td><i class='fas fa-check-square hd-check-contact'></i> <i class='fas fa-trash delete-btn-ct' data-idct='{$row['id']}'></i></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No bookings available</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Bảng sắp xếp tăng dần (ASC) -->
                    <table class="orders-table-contact" id="table-asc" style="display: none;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Request Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Truy vấn dữ liệu tăng dần
                            $sql_asc = "SELECT id, name, email, phone, message, date, status FROM contact ORDER BY id ASC";
                            $result_asc = $con->query($sql_asc);

                            if ($result_asc->num_rows > 0) {
                                while ($row = $result_asc->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>#{$row['id']}</td>";
                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                    echo "<td><i class='fas fa-check-square hd-check-contact'></i> <i class='fas fa-trash delete-btn-ct' data-idct='{$row['id']}'></i></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No bookings available</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Modal Update contact-->
            <div id="statusModal-ct" class="modalstt">
                <div class="modal-contentstt">
                    <h3>Have You Contacted ?</h3>
                    <select id="statusSelect-ct">
                        <option value="Waiting">Waiting</option>
                        <option value="Done">Done</option>
                    </select>
                    <button id="saveStatusBtn-ct">Save</button>
                    <button id="closeModal-ct">Cancel</button>
                </div>
            </div>
        </footer>
    </div>

    <!-- script xử lý các modal ADMIN -->
    <script src="../../js/handleAD.js"></script>
    <!-- script test -->
    <script>

    </script>
</body>

</html>