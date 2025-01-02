<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/booking.css">
</head>

<body>
    <header>
        <h1>Reservation</h1>
        <p>Discover our world's #1 Luxury Room For VIP.</p>
        <button class="home-button" onclick="window.location.href='../../tdhotel'">BACK TO HOME</button>
    </header>

    <div class="container">
        <div class="main-content">
            <div class="room-details">
                <img src="../images/room1.jpg" alt="IMG">
                <h2>
                    Deluxe Room
                    <span>
                        <p>From</p> $450
                    </span>
                </h2>
                <div class="features">
                    <span><i class="fas fa-solid fa-tv"></i> Smart TV</span>
                    <span><i class="fas fa-solid fa-wifi"></i> High Wi-Fi</span>
                    <span><i class="fas fa-regular fa-eye"></i> View</span>
                    <span><i class="fas fa-solid fa-dumbbell"></i> Gym</span>
                    <span><i class="fas fa-solid fa-bath"></i> Bathtub</span>
                </div>
            </div>

            <div class="form-section">
                <h2>ROOM SERVICE</h2>
                <form>
                    <div class="form-group">
                        <label for="room">Room*</label>
                        <select id="room">
                            <option>Deluxe Room</option>
                            <option>Standard Room</option>
                            <option>Suite</option>
                            <option>Family Room</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name*</label>
                            <input type="text" id="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number*</label>
                            <input type="tel" id="phone" placeholder="Enter your phone number" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="arrival">Arrival Date*</label>
                            <input type="date" id="arrival" required>
                        </div>
                        <div class="form-group">
                            <label for="departure">Departure Date*</label>
                            <input type="date" id="departure" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="guests">Guests*</label>
                            <select id="guests">
                                <option>1 Guest</option>
                                <option>2 Guests</option>
                                <option>3 Guests</option>
                                <option>4 Guests</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="meal">Meal</label>
                            <select id="meal">
                                <option>Room only</option>
                                <option>Snacks</option>
                                <option>Breakfast</option>
                                <option>Lunch</option>
                                <option>Dinner</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-total">Total: $392</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit">CONFIRM</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="description">
            Reserve your stay with us today and indulge in a luxurious escape where every detail is designed to offer
            the ultimate in comfort, convenience, and personalized service, ensuring that your stay is not just a visit,
            but an unforgettable experience tailored to meet your every need and desire !!
        </div>

        <div class="blog-section">
            <div class="recent-blogs">
                <h3>Recent Blog</h3>
                <div class="blog-item">
                    <img src="../images/banner.jpg" alt="Blog">
                    <div class="blog-details">
                        <h4>Explore the latest trends in the travel and hospitality industry</h4>
                        <div class="meta">Oct 18, 2024 | Admin | 06</div>
                    </div>
                </div>
                <div class="blog-item">
                    <img src="../images/n11.jpg" alt="Blog">
                    <div class="blog-details">
                        <h4>Stay updated with our newest posts, sharing tips and insights</h4>
                        <div class="meta">Aug 22, 2024 | Admin | 19</div>
                    </div>
                </div>
            </div>

            <div class="tag-cloud">
                <h3>Tag Cloud</h3>
                <div class="tags">
                    <span>Dish</span>
                    <span>Menu</span>
                    <span>Food</span>
                    <span>Sweet</span>
                    <span>Tasty</span>
                    <span>Delicious</span>
                    <span>Desserts</span>
                    <span>Drinks</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>