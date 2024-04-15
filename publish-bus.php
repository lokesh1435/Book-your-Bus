<?php
include_once('database/connection.php');
session_start();

if(empty($_SESSION['user'])){
    header('location:login.php');
    exit();
}

$sql = "SELECT bo.id,b.bus_no,r.start_point,r.end_point,s.cost,s.start_time,s.reached_time,bo.total_tickets,bo.status
FROM schedules s
INNER JOIN buses b ON b.id = s.bus_id
INNER JOIN routes r ON r.id = s.route_id
INNER JOIN bookings bo ON bo.schedule_id = s.id
WHERE bo.user_id = '". $_SESSION['user']['id'] ."'
ORDER BY b.id DESC";

$stmt=$connection->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();
include_once('include/header.php');

?>
    <section class="login1 services1">
        <div class="container">
            <div class="login-heading">
            
            </div>
        </div>
    </section>

    <section class="taxi-rate">
        <div class="container">
            <div class="title">
                <h2 class="site-title">Add your Bus Routes Here</h2>
            </div>
            <div class="pub_btn">
                <a class="btn" href="add-bus.php">Add a New Routes</a>
            </div>
            <div class="rate-wrap">
                <div class="row">
                    <?php 
                    if($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){ ?>
                    <div class="col6">
                        <div class="rate-box">
                            
                    </div>                    
                    <?php } ?>
                    <?php }else{ ?>
                        <div class="col5">
                        <div class="rate-box test">
                            <h2>No New Routes are Published Yet</h2>
                        </div>
                    </div> 
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    
   <?php
include_once('include/footer.php');
?>