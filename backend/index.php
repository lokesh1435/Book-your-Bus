<?php
//connection & session
include_once('../database/connection.php');
session_start();

//redirect to login if user not login
if(empty($_SESSION['admin'])){
    header('location:login.php');
    exit();
}

include_once('include/header.php');
include_once('include/sidebar.php');
?>

        <heading>
            <h2>Welcome to Dashbaord ! <?php echo strtoupper($_SESSION['admin']['role']) ?></h2>
        </heading>
        <div class="dashbaord-box">
            <div class="box">
                <div class="box-left">
                    <i class="fa fa-bus"></i>
                </div>
                <div class="box-right">
                    <h3>Total Buses!</h3>
                    <h4><?php echo rand(15,8) ?></h4>
                </div>
            </div>
            <div class="box">
                <div class="box-left">
                    <i class="fa fa-bus"></i>
                </div>
                <div class="box-right">
                    <h3>Total Schedules!</h3>
                    <h4><?php echo rand(27,13) ?></h4>
                </div>
            </div>
            <div class="box">
                <div class="box-left">
                    <i class="fa fa-bus"></i>
                </div>
                <div class="box-right">
                    <h3>Total Bookings!</h3>
                    <h4><?php echo rand(10,28) ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>