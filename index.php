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

    <!-- Gallery -->
    <div class="gallery-section">
        <h2>GALLERY</h2>
        <div class="gallery-grid">
            <div class="gallery-item" data-info="Room 1">
                <img src="images/n1.jpg" alt="Room 1">
            </div>
            <div class="gallery-item" data-info="Room 2">
                <img src="images/n2.jpg" alt="Room 2">
            </div>
            <div class="gallery-item" data-info="Room 3">
                <img src="images/n3.jpg" alt="Room 3">
            </div>
            <div class="gallery-item" data-info="Room 4">
                <img src="images/n4.jpg" alt="Room 4">
            </div>
            <div class="gallery-item" data-info="Room 5">
                <img src="images/n5.jpg" alt="Room 5">
            </div>
            <div class="gallery-item" data-info="Room 6">
                <img src="images/n6.jpg" alt="Room 6">
            </div>
            <div class="gallery-item" data-info="Room 1">
                <img src="images/n7.jpg" alt="Room 1">
            </div>
            <div class="gallery-item" data-info="Room 2">
                <img src="images/n8.jpg" alt="Room 2">
            </div>
            <div class="gallery-item" data-info="Room 3">
                <img src="images/n9.jpg" alt="Room 3">
            </div>
            <div class="gallery-item" data-info="Room 4">
                <img src="images/n10.png" alt="Room 4">
            </div>
            <div class="gallery-item" data-info="Room 5">
                <img src="images/n11.jpg" alt="Room 5">
            </div>
            <div class="gallery-item" data-info="Room 6">
                <img src="images/n12.jpeg" alt="Room 6">
            </div>
        </div>
    </div>

    <!-- Fullscreen Viewer -->
    <div class="fullscreen-viewer">
        <span class="close-btn">&times;</span>
        <div class="viewer-content">
            <img id="fullscreen-image" src="" alt="Fullscreen Image">
            <p id="image-info"></p>
        </div>
        <button class="prev-btn">&#10094;</button>
        <button class="next-btn">&#10095;</button>
    </div>
    <!-- End Gallery -->

    <!-- Contact -->
    <section class="contact-us">
        <div class="contact-form">
            <h2>Contact Us</h2>
            <p>If you need further assistance, please leave a message, we will respond to you immediately.</p>
            <form id="contactForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>

                <div class="form-group-message">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" placeholder="Write your message" required></textarea>
                </div>
            </form>
        </div>

        <div class="contact-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4676291827705!2d106.70130297355188!3d10.775451359214731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4407b01b09%3A0x760e827116eeffe1!2zQuG6v24gQuG6oWNoIMSQ4bqxbmc!5e0!3m2!1svi!2s!4v1735635467003!5m2!1svi!2s"
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <button type="submit" form="contactForm" class="submit-btn">Send Message</button>
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
                        <img src="images/person1.jpg" alt="Customer 1">
                        <div class="author-details">
                            <span>Erik Muskap</span>
                            <p>★ ★ ★ ★ ★</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"I loved the pool and the dining experience. Highly recommended !"</p>
                    <div class="testimonial-author">
                        <img src="images/person2.jpg" alt="Customer 2">
                        <div class="author-details">
                            <span>Jane Smith</span>
                            <p>★ ★ ★ ★ ★</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"A perfect stay with top-notch facilities and friendly staff."</p>
                    <div class="testimonial-author">
                        <img src="images/person3.jpg" alt="Customer 3">
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

    <!-- script gallery-->
    <script src="js/gallery.js"></script>
</body>

</html>