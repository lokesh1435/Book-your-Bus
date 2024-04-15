<?php
include_once('database/connection.php');
session_start();

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $stmt=$connection->prepare("INSERT INTO queries (name,contact,email,message) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss",$name,$contact,$email,$message);
    if($stmt->execute()){
        echo "<script>alert('Thanx For Your Message! We Response Your Message Shortly.')
        </script>";
    }
}

include_once('include/header1.php');
?>
    <section class="contact1">
        <div class="container">
            <h1>Contact Us</h1>
        </div>
    </section>
    <section class="contact2">
        <div class="container">
            <div class="row">
                <div class="col6">
                    <div class="contact-left">
                        <form action="" method="POST">
                            <h2>Send Us Message</h2>
                            <div class="input-grid">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="input-grid">
                                <label for="email">Contact</label>
                                <input type="tel" name="contact" placeholder="Contact" required>
                            </div>
                            <div class="input-grid">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" placeholder="Email Address" required>
                            </div>
                            <div class="input-grid">
                                <label for="message">Message</label>
                                <textarea name="message" placeholder="Message"></textarea>
                            </div>
                            <button name="submit" class="btns">Send Message</button>
                        </form>
                        <h2>Get In Touch With Us</h2>
                        <div class="address">
                            <ul>
                                <li> <i class="fa fa-map-marker"></i>
                                    <p>777 Glades Rd, Boca Raton, FL 33431</p>
                                </li>
                                <li> <i class="fa fa-envelope"></i>
                                    <p>customer@transpo.com</p>
                                </li>
                                <li> <i class="fa fa-phone"></i>
                                    <p>+1 9546585703</p>
                                </li>

                            </ul>
                        </div>
                        <div class="social-links">
                            <a href="https://www.facebook.com/your-page-url" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/your-twitter-handle" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/your-instagram-handle" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/your-linkedin-url" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </div>

                        
                    </div>
                </div>
                <div class="col6">
                    <div class="contact-right">
                        <iframe src="https://maps.google.com/maps?q=London%20Eye%2C%20London%2C%20United%20Kingdom&t=m&z=10&output=embed&iwloc=near" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include_once('include/footer.php');
?>