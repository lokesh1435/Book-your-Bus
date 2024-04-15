<?php
include_once('database/connection.php');
session_start();

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

include_once('include/header1.php');
?>

<section class="search1">
        <div class="container">
            <h1>My Bookings</h1>
        </div>
    </section>
    <section class="search2">
        <div class="container">
            <div class="row">
                <div class="col12">
                    <div class="search-right">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Bus No</th>
                                    <th>Route</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>total Tickets</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php 
                                $sr=1;
                                while($row=$result->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $sr++ ?></td>
                                    <td><?php echo $row['bus_no'] ?></td>
                                
                                    </td>
                                    <td><?php echo $row['start_point'] ." -> ". $row['end_point'] ?></td>
                                    <td><?php echo date("d-M-y h:i A",strtotime($row['start_time'])) ?></td>
                                    <td><?php echo date("d-M-y h:i A",strtotime($row['reached_time'])) ?></td>
                                    <td><?php echo $row['total_tickets'] ?></td>
                                    <td><?php echo $row['cost'] ?></td>
                                    <td><?php echo $row['cost']*$row['total_tickets'] ?></td>
                                    <?php if($row['status'] == 0){ ?>
                                    <td><div class="badge badge-warning">Not Paid</div></td>
                                    <?php }elseif($row['status'] == 1){ ?>
                                    <td>
                                        <div class="badge badge-success">Confirm</div>
                                    </td>
                                    <?php }elseif($row['status'] == 2){ ?>
                                        <td>
                                        <div class="badge badge-success">Cancelled</div>
                                    </td>
                                    <?php } ?>
                                    <?php if($row['status'] == 0){ ?>
                                    <td>
                                        <a href="payment.php?id=<?php echo $row['id'] ?>" class="cancel">Pay Now</a>
                                    </td>
                                    <?php }elseif($row['status'] == 1){ ?>
                                        <td>
                                            <a href="booking_status.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Sure To Cancel Your Booking!')" class="cancel">Cancel  Booking</a>
                                        </td>
                                        <?php }else{ ?>
                                            <td>-</td>
                                            <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
                        <span>Download Shuttle App</span>
                        <h2>Find A Bus Charter Near You With Our App</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id, sunt error? Odit laboriosam praesentium obcaecati inventore ab, assumenda neque officia nihil reprehenderit cum adipisci incidunt eligendi rem reiciendis quisquam ratione.</p>
                        <div class="btn-wrap">
                            <a href="#"><img src="img/app-store.png" alt="app-store" title="app-store"></a>
                            <a href="#"><img src="img/googleplay.png" alt="google-play" title="google-play"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include_once('include/footer.php');
?>
