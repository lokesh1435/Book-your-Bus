<?php
include_once('database/connection.php');
session_start();

$ct=time();

$sql = "SELECT b.bus_no,b.image,r.start_point,r.end_point,s.*
FROM schedules s
INNER JOIN buses b ON b.id = s.bus_id
INNER JOIN routes r ON r.id = s.route_id
WHERE s.start_time >= $ct";

$stmt=$connection->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();

include_once('include/header.php');
?>

<section class="home-1">
        <div class="container">
            <div class="row">
                <div class="col7">
                    <div class="colleft">

                        <h1>Book Your Bus Tickets Online Today!</h1>
                        <p>Find and book affordable bus tickets online with our easy-to-use platform. Enjoy a comfortable and convenient journey with reliable bus services to top destinations across the country. Choose from a wide range of buses and routes,
                            and make secure payments through our payment gateway. Get instant booking confirmations and e-tickets delivered to your inbox. Experience hassle-free travel with our reliable bus booking platform.</p>
                    </div>
                </div>
                <div class="col5">
                    <div class="colright">
                        <div class="home-form">
                            <form action="search.php" method="GET">
                                <div class="input-grid">
                                    <label for="travel from">Travel From</label>
                                    <input type="text" placeholder="Travel From" name="from" required>
                                </div>
                                <div class="input-grid">
                                    <label for="travel To">Travel To</label>
                                    <input type="text" placeholder="Travel To" name="to" required>
                                </div>
                                <div class="input-grid">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" placeholder="Date" required min="<?php echo date('Y-m-d'); ?>">
                                </div>

                                <button name="submit" class="btns">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-2">
        <div class="container">
            <div class="row">
                <div class="col6">
                    <div class="about-left">
                        <img src="img/about-section.jpg" alt="img" title="img">
                    </div>
                </div>
                <div class="col6">
                    <div class="about-right">
                        <span>About Bestbus</span>
                        <h2>Discover Our Reliable Bus Services</h2>
                        <p>Our online bus booking platform offers a hassle-free booking experience for bus travel across the country. We strive to provide affordable and reliable travel options to our customers with a user-friendly platform. </p>
                        <ul>
                            <li>

                                <i class="fa fa-check"></i>
                                <p>
                                    Comfortable Travel </p>
                            </li>
                            <li>

                                <i class="fa fa-check"></i>
                                <p>
                                    Easy Booking </p>
                            </li>
                            <li>

                                <i class="fa fa-check"></i>
                                <p>
                                    Secure Payment Gateway</p>
                            </li>
                            <li>

                                <i class="fa fa-check"></i>
                                <p>
                                    24/7 Customer Support </p>
                            </li>
                        </ul>
                        <a href="about.html" class="btns">About More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-4">
        <div class="row">
            <div class="choose-left">
                <div class="choose-top">
                    <span>Why Choose Us</span>
                    <h2>Reliable and Convenient Bus Travel Services</h2>
                    <p>Discover the benefits of booking with us - easy booking process, affordable rates, real-time seat availability, reliable services, and friendly customer support. Choose us for a seamless travel experience.</p>
                </div>
                <div class="choose-bottom">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fa fa-bus"></i>
                            </div>
                            <div class="content">
                                <h4>25+</h4>
                                <p>Buses Ready</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="content">
                                <h4>2000+</h4>
                                <p>Satisfied Customer</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="img">
                <img src="img/choose.jpg" alt="img" title="img">
            </div>


        </div>
    </section>
    <section class="home-3">
        <div class="container">
            <div class="heading">
                <span>Our Services</span>
                <h2>We Provide Best Services For You</h2>
                <p>Book your bus tickets online from anywhere, anytime. Enjoy a seamless and hassle-free booking experience with our user-friendly platform. </p>
            </div>
            <div class="service-wrap">
                <div class="row">
                    <div class="col4">
                        <div class="service-box">
                            <div class="icon">
                                <i class="fa fa-tag"></i>
                            </div>
                            <div class="info">
                                <h3>Discounts and Promotions</h3>
                                <p>We offer regular discounts and promotions on our bus services, allowing you to save money on your travel expenses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col4">
                        <div class="service-box">
                            <div class="icon">
                                <i class="fa fa-usd"></i>
                            </div>
                            <div class="info">
                                <h3>Secure Online Payments</h3>
                                <p>Our platform offers secure online payment options through various payment gateways. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col4">
                        <div class="service-box">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="info">
                                <h3>24/7 Customer Support</h3>
                                <p>We offer round-the-clock customer support through various channels, including phone, email, and online helpdesk. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-5">
        <div class="container">
            <div class="row">
                <div class="col6">
                    <div class="image">
                        <img src="img/mobile.png" alt="image" title="image">
                    </div>
                </div>
                <div class="col6">
                    <div class="content">
                        <span>Download Bestbus App</span>
                        <h2>Get Our Mobile App for Hassle-Free Booking</h2>
                        <p>Download our app for quick and easy bus ticket booking. Get real-time updates, secure payments, and exclusive discounts on your bookings.</p>
                        <div class="btn-wrap">
                            <a href="#"><img src="img/app-store.png" alt="app-store" title="app-store"></a>
                            <a href="#"><img src="img/googleplay.png" alt="google-play" title="google-play"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if($result->num_rows > 0){ ?>
    <section class="home-6">
        <div class="container">
            <div class="heading">
                <span>Recently Available Schedules</span>
                <p>Choose from luxury buses, sleeper coaches, and air-conditioned buses. Enjoy comfortable seats, entertainment systems, and air-conditioning on your journey. </p>
            </div>
            <div class="bus-wrap">
                <div class="row">
                    <?php while($row=$result->fetch_assoc()){ ?>
                    <div class="col4">
                        <div class="bus-box">
                            <div class="image">
                                <a href="bus-detail.html">
                                    <?php ?>
                                    <img src="backend/busimages/<?php echo $row['image']; ?>" alt="bus" title="bus">
                                </a>
                            </div>
                            <div class="box-info">
                                <h3><?php echo $row['bus_no']; ?></h3>
                                <div class="price">
                                    <span>$<?php echo $row['cost'] ?></span>
                                    <p>/per seat</p>
                                </div>
                                <div class="box-items">
                                    <ul>
                                        <li><i class="fa fa-road"></i>
                                            <p><?php echo $row['start_point'] ." TO ". $row['end_point'] ?></p>
                                        </li>
                                        <li><i class="fa fa-users"></i>
                                            <p>Total Seats: <?php echo $row['total_seats'] ?></p>
                                        </li>
                                        <li><i class="fa fa-users"></i>
                                            <p>Available Seats: <?php echo $row['available_seats'] ?></p>
                                        </li>
                                        <li><i class="fa fa-users"></i>
                                            <p>Handicap Seats: <?php echo $row['handicap_seats'] ?></p>
                                        </li>
                                        <li><i class="fa fa-calendar"></i>
                                            <p><?php echo date("d-M-y h:i A",strtotime($row['start_time'])) ?></p>
                                        </li>
                                        <li><i class="fa fa-calendar"></i>
                                            <p><?php echo date("d-M-y h:i A",strtotime($row['reached_time'])) ?></p>
                                        </li>
                                    </ul>
                                    <?php if(isset($_SESSION['user'])){ ?>
                                    <a href="booking.php?id=<?php echo base64_encode($row['id']) ?>&_id=<?php $str=rand(); echo md5($str); ?>" class="btns">Book Now</a>
                                    <?php }else{ ?>
                                        <a href="login.php" class="btns">Book Now</a>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <section class="client">
        <div class="container">
            <div class="heading">
                <span>Our Testimonial</span>
                <h2>What Our Clients Are Saying</h2>
                <p>Read reviews and feedback from our satisfied customers. Find out what they love about our services and how we've made their journeys enjoyable and hassle-free. </p>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="client-box">
                        <p>Booking with this platform was a breeze. The bus was comfortable and the ride was smooth. Highly recommend this service for hassle-free travel arrangements.</p>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <div class="client-info">
                            <div class="image">
                                <img src="img/client1.jpg" alt="client" title="img">
                            </div>
                            <div class="name">
                                <h4>Bennett Miller</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="client-box">
                        <p>I recently booked a group travel package for my family and friends and it exceeded my expectations. The bus was clean, spacious and the driver was courteous and professional.</p>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <div class="client-info">
                            <div class="image">
                                <img src="img/client2.jpg" alt="client" title="img">
                            </div>
                            <div class="name">
                                <h4>Laura Ferguson </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="client-box">
                        <p>The real-time updates and notifications kept me informed throughout my journey. I've had nothing but great experiences booking with this platform and would highly recommend it to others.</p>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <div class="client-info">
                            <div class="image">
                                <img src="img/client3.jpg" alt="client" title="img">
                            </div>
                            <div class="name">
                                <h4>Audrey Stevenson</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php
include_once('include/footer.php');
?>