<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD Hotel</title>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header">
        <div class="header-container">
            <!-- Logo -->
            <div class="header-left">
                <h1>TD HOTEL</h1>
            </div>

            <!-- Menu header -->
            <div class="header-right">
                <nav>
                    <ul class="nav-links">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">GALLERY</a></li>
                        <li><a href="#">ROOMS</a></li>
                        <li><a href="#">CONTACT US</a></li>
                    </ul>
                </nav>
                <div class="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Backgound blur -->
    <div class="overlay">
        <div class="overlay-content">
            <h1>Welcome to Our Hotel</h1>
            <p>Experience the perfect blend of luxury and comfort during your stay.</p>
            <button class="book-btn">Book Room</button>
        </div>
    </div>

    <!-- Services -->
    <section class="services">
        <div class="services-container">
            <h2 class="services-title">Our Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <i class="fas fa-concierge-bell"></i>
                    <h3>24/7 Concierge</h3>
                    <p>Enjoy round-the-clock assistance for all your needs during your stay.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-swimming-pool"></i>
                    <h3>Luxury Pool</h3>
                    <p>Relax and unwind at our stunning rooftop swimming pool.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-utensils"></i>
                    <h3>Fine Dining</h3>
                    <p>Indulge in gourmet cuisine crafted by world-class chefs.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-spa"></i>
                    <h3>Spa & Wellness</h3>
                    <p>Rejuvenate with our exclusive spa treatments and wellness programs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="testimonials-container">
            <h2 class="testimonials-title">What Our Guests Say</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <p class="testimonial-text">"The service was outstanding, and the room was so cozy !!"</p>
                    <div class="testimonial-author">
                        <img src="images/person1" alt="Customer 1">
                        <div class="author-details">
                            <span>Erik Muskap</span>
                            <p>★ ★ ★ ★ ★</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"I loved the pool and the dining experience. Highly recommended !"</p>
                    <div class="testimonial-author">
                        <img src="images/person2" alt="Customer 2">
                        <div class="author-details">
                            <span>Jane Smith</span>
                            <p>★ ★ ★ ★ ★</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"A perfect stay with top-notch facilities and friendly staff."</p>
                    <div class="testimonial-author">
                        <img src="images/person3" alt="Customer 3">
                        <div class="author-details">
                            <span>Emily Brown</span>
                            <p>★ ★ ★ ★ </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
    </main>

    <!-- Footer-->
    <footer class="footer">
        <div class="footer-container">
            <!-- left -->
            <div class="footer-left">
                <h2>TIEN DAT HOTEL</h2>
                <p>A luxurious, comfortable stay with attentive service and a convenient location, making it the perfect
                    choice for relaxation and city exploration.</p>
            </div>

            <!-- mid -->
            <div class="footer-center">
                <h3>CONTACT INFORMATION</h3>
                <p><i class="fas fa-phone"></i> Phone: +123 456 789</p>
                <p><i class="fas fa-envelope"></i> Email: admin@gmail.com</p>
                <p><i class="fas fa-map-marker-alt"></i> Address: 123 District 1, Ho Chi Minh City</p>
            </div>

            <!-- right -->
            <div class="footer-right">
                <p>FOLLOW US:</p>
                <div class="social-icons">
                    <a href="#" class="icon fb"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="icon ig"><i class="fab fa-instagram-square"></i></a>
                    <a href="#" class="icon tw"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="icon yt"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- script header -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuToggle = document.querySelector('.menu-toggle');
            const navLinks = document.querySelector('.nav-links');

            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        });
    </script>
    <!-- script chua dung-->
    <!-- <script src="js/script.js"></script> -->
</body>

</html>