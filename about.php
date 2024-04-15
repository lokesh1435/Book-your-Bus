<?php
include_once('database/connection.php');
session_start();

include_once('include/header.php');
?>
    <section class="contact1 about1">
        <div class="container">
            <h1>About Us</h1>
        </div>
    </section>
    <section class="home-2">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col6">
                    <div class="about-right">
                        <span>About Bestbus</span>
                        <h2>Who We Are </h2>
                        <p>BestBus is a leading online bus booking platform that connects passengers with a vast network of bus operators across India. We are committed to providing safe, reliable and comfortable travel experiences at affordable prices.
                            With our easy-to-use website and mobile app, customers can book bus tickets from the comfort of their homes and enjoy hassle-free journeys. Our customer support team is always available to assist with any queries or concerns,
                            ensuring a seamless experience from start to finish.</p>



                    </div>
                </div>
                <div class="col6">
                    <div class="about-left">
                        <img src="img/about2.jpg" alt="img" title="img">
                    </div>
                </div>

            </div>
        </div>
    </section>
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
    <section class="about2">
        <div class="container">
            <div class="row">
                <div class="col6">
                    <div class="excellent-left">
                        <img src="img/about3.jpg" alt="excellent" title="excellent">
                    </div>
                </div>
                <div class="col6">
                    <div class="excellent-right">
                        <span>Excellent</span>
                        <h2> Excellent Customer Service</h2>
                        <p>At BestBus, we pride ourselves on providing exceptional customer service. Our dedicated support team is available 24/7 to assist with any queries or concerns, ensuring a seamless booking experience from start to finish. We value
                            our customers' feedback and continuously strive to improve our services based on their suggestions. Our commitment to excellence has earned us a loyal customer base, who trust us for their travel needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include_once('include/footer.php');
?>