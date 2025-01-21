<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <title>Admin TD Hotel</title>
    <link rel="stylesheet" href="../../css/admin.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="sidebar">
        <div class="logo">TD Hotel</div>
        <button class="close-btn"><i class="fa-regular fa-circle-xmark"></i></button>
        <ul class="menu">
            <li class="menu-item active"><a href="admin.php/"><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="menu-item"><a href="#"><i class="fa-regular fa-credit-card"></i> Payment</a></li>
            <p class="menu-title">Account Settings</p>
            <li class="menu-item"><a href="#"><i class="fas fa-sign-in-alt"></i> Log out</a></li>
            <li class="menu-item"><a href="#"><i class="fas fa-user-plus"></i> Register</a></li>
            <li class="menu-item"><a href="#"><i class="fa-solid fa-user-lock"></i> Forgot Password</a></li>
            <li class="menu-item"><a href="#"><i class="fa-solid fa-unlock-keyhole"></i> Reset Password</a></li>
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
                <li><a href="#"><i class="fas fa-moon"></i></a></li>
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
                    <button class="view-badges">Back User</button>
                </div>
                <div class="img-intro">
                    <img src="../../images/admin-light.png" alt="IMG">
                </div>
            </div>
            <div class="stats">
                <div class="stat-box color-r"><i class="fas fa-wallet"></i>Revenue<br><span>$12,628</span></div>
                <div class="stat-box color-r"><i class="fas fa-users"></i>Client<br><span>42</span></div>
                <div class="stat-box color-c"><i class="far fa-id-card"></i>Contact<br><span>18</span></div>
                <div class="stat-box color-c"><i class="fab fa-servicestack"></i>Service<br><span>146</span></div>
            </div>
        </section>

        <section class="orders">
            <div class="orders-header">
                <h2>Booking Status</h2>
                <button class="filter"> <i class="fas fa-sort"></i> </button>
            </div>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Client</th>
                        <th>Email</th>
                        <th>Room</th>
                        <th>Guest</th>
                        <th>In</th>
                        <th>Out</th>
                        <th>Status</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#12</td>
                        <td>John Carter</td>
                        <td>tiendat@gmail.com</td>
                        <td>Deluxe Room</td>
                        <td>2</td>
                        <td>May 03, 2024</td>
                        <td>May 04, 2024</td>
                        <td>Delivered</td>
                        <td><i class="fas fa-info-circle"></i>
                            <i class="fas fa-check-square"></i> |
                            <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>#12</td>
                        <td>John Carter</td>
                        <td>tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com</td>
                        <td>Standard Room</td>
                        <td>2</td>
                        <td>May 03, 2024</td>
                        <td>May 04, 2024</td>
                        <td>Delivered</td>
                        <td><i class="fas fa-info-circle"></i>
                            <i class="fas fa-check-square"></i> |
                            <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>#12</td>
                        <td>John Carter</td>
                        <td>tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com</td>
                        <td>Deluxe Room</td>
                        <td>2</td>
                        <td>May 03, 2024</td>
                        <td>May 04, 2024</td>
                        <td>Delivered</td>
                        <td><i class="fas fa-info-circle"></i>
                            <i class="fas fa-check-square"></i> |
                            <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>#12</td>
                        <td>John Carter</td>
                        <td>tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com</td>
                        <td>Deluxe Room</td>
                        <td>2</td>
                        <td>May 03, 2024</td>
                        <td>May 04, 2024</td>
                        <td>Delivered</td>
                        <td><i class="fas fa-info-circle"></i>
                            <i class="fas fa-check-square"></i> |
                            <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>#12</td>
                        <td>John Carter</td>
                        <td>tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com</td>
                        <td>Deluxe Room</td>
                        <td>2</td>
                        <td>May 03, 2024</td>
                        <td>May 04, 2024</td>
                        <td>Delivered</td>
                        <td><i class="fas fa-info-circle"></i>
                            <i class="fas fa-check-square"></i> |
                            <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>#12</td>
                        <td>John Carter</td>
                        <td>tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com</td>
                        <td>Deluxe Room</td>
                        <td>2</td>
                        <td>May 03, 2024</td>
                        <td>May 04, 2024</td>
                        <td>Delivered</td>
                        <td><i class="fas fa-info-circle"></i>
                            <i class="fas fa-check-square"></i> |
                            <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>#12</td>
                        <td>John Carter</td>
                        <td>tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com</td>
                        <td>Deluxe Room</td>
                        <td>2</td>
                        <td>May 03, 2024</td>
                        <td>May 04, 2024</td>
                        <td>Delivered</td>
                        <td><i class="fas fa-info-circle"></i>
                            <i class="fas fa-check-square"></i> |
                            <i class="fas fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>#12</td>
                        <td>John Carter</td>
                        <td>tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com</td>
                        <td>Deluxe Room</td>
                        <td>2</td>
                        <td>May 03, 2024</td>
                        <td>May 04, 2024</td>
                        <td>Delivered</td>
                        <td><i class="fas fa-info-circle"></i>
                            <i class="fas fa-check-square"></i> |
                            <i class="fas fa-trash"></i>
                        </td>
                    </tr>



                </tbody>
            </table>
        </section>


        <footer class="footer">
            <div class="todo-list">
                <h3>Todo List <i class="fas fa-plus-circle"></i></h3>
                <ul>
                    <li>
                        <input type="checkbox">
                        <span>Lorem ipsum is dummy text of the printing sfweu fwiefh owiefhowieg weoi</span>
                        <span class="time">10:00 AM <i class="fas fa-trash"></i></span>
                    </li>
                    <li>
                        <input type="checkbox">
                        <span>Lorem ipsum is dummy text of the printing</span>
                        <span class="time">12:30 PM <i class="fas fa-trash"></i></span>
                    </li>
                    <li>
                        <input type="checkbox">
                        <span>Lorem ipsum is dummy text of the printing</span>
                        <span class="time">02:15 PM <i class="fas fa-trash"></i></span>
                    </li>
                    <li>
                        <input type="checkbox">
                        <span>Lorem ipsum is dummy text of the printing</span>
                        <span class="time">04:00 PM <i class="fas fa-trash"></i></span>
                    </li>
                </ul>
            </div>


            <div class="send-message">
                <div class="orders-header">
                    <h2>Send Message</h2>
                    <button class="filter"> <i class="fas fa-sort"></i> </button>
                </div>
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#6</td>
                            <td>Dat</td>
                            <td>tiendat@gmail.com</td>
                            <td>0909123</td>
                            <td>Hello tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com
                                tiendat@gmail.com tiendat@gmail.com</td>
                            <td>May 03, 2024</td>
                            <td>Delivered</td>
                            <td><i class="fas fa-check-square"></i> <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>#6</td>
                            <td>Dat</td>
                            <td>tiendat@gmail.com</td>
                            <td>0909123</td>
                            <td>Hello tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com
                                tiendat@gmail.com tiendat@gmail.com</td>
                            <td>May 03, 2024</td>
                            <td>Delivered</td>
                            <td><i class="fas fa-check-square"></i> <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>#6</td>
                            <td>Dat</td>
                            <td>tiendat@gmail.com</td>
                            <td>0909123</td>
                            <td>Hello tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com
                                tiendat@gmail.com tiendat@gmail.com</td>
                            <td>May 03, 2024</td>
                            <td>Delivered</td>
                            <td><i class="fas fa-check-square"></i> <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>#6</td>
                            <td>Dat</td>
                            <td>tiendat@gmail.com</td>
                            <td>0909123</td>
                            <td>Hello tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com
                                tiendat@gmail.com tiendat@gmail.com</td>
                            <td>May 03, 2024</td>
                            <td>Delivered</td>
                            <td><i class="fas fa-check-square"></i> <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>#6</td>
                            <td>Dat</td>
                            <td>tiendat@gmail.com</td>
                            <td>0909123</td>
                            <td>Hello tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com
                                tiendat@gmail.com tiendat@gmail.com</td>
                            <td>May 03, 2024</td>
                            <td>Delivered</td>
                            <td><i class="fas fa-check-square"></i> <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>#6</td>
                            <td>Dat</td>
                            <td>tiendat@gmail.com</td>
                            <td>0909123</td>
                            <td>Hello tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com
                                tiendat@gmail.com tiendat@gmail.com</td>
                            <td>May 03, 2024</td>
                            <td>Delivered</td>
                            <td><i class="fas fa-check-square"></i> <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>#6</td>
                            <td>Dat</td>
                            <td>tiendat@gmail.com</td>
                            <td>0909123</td>
                            <td>Hello tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com
                                tiendat@gmail.com tiendat@gmail.com</td>
                            <td>May 03, 2024</td>
                            <td>Delivered</td>
                            <td><i class="fas fa-check-square"></i> <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>#6</td>
                            <td>Dat</td>
                            <td>tiendat@gmail.com</td>
                            <td>0909123</td>
                            <td>Hello tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com tiendat@gmail.com
                                tiendat@gmail.com tiendat@gmail.com</td>
                            <td>May 03, 2024</td>
                            <td>Delivered</td>
                            <td><i class="fas fa-check-square"></i> <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </footer>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuToggle = document.querySelector(".menu-toggle");
        const sidebar = document.querySelector(".sidebar");
        const closeBtn = document.querySelector(".close-btn");
        const overlay = document.querySelector(".overlay");

        menuToggle.addEventListener("click", function () {
            sidebar.classList.add("open");
            overlay.style.display = "block";  // Hiển thị overlay khi sidebar mở
        });

        closeBtn.addEventListener("click", function () {
            sidebar.classList.remove("open");
            overlay.style.display = "none";  // Ẩn overlay khi sidebar đóng
        });

        overlay.addEventListener("click", function () {
            sidebar.classList.remove("open");
            overlay.style.display = "none";  // Ẩn overlay khi bấm ra ngoài
        });
    });

</script>

</html>