<?php

include_once('../database/connection.php');
session_start();

$sql = "SELECT bo.*,u.name,s.start_time,s.reached_time,r.start_point,r.end_point,b.bus_no
FROM bookings bo
INNER JOIN schedules s ON s.id = bo.schedule_id
INNER JOIN buses b ON b.id = s.bus_id
INNER JOIN routes r ON r.id = s.route_id
INNER JOIN users u ON u.id = bo.user_id";

if($_SESSION['admin']['role'] == 'busoperator'){
    $sql = $sql .' WHERE s.added_by = '. $_SESSION['admin']['id'];
}

$stmt=$connection->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();

include_once('include/header.php');
include_once('include/sidebar.php');
?>


<div class="heading">
    <h2>Bookings</h2>
</div>
<div class="table-container">
<table class="table-responsive">
    <thead>
        <tr>
            <th>Sr. No</th>
            <th>Bus No</th>
            <th>Route</th>
            <th>Date-Time</th>
            <th>Total Tickets</th>
            <th>Status</th>
            <!-- <th>Action</th> -->
        </tr>
    </thead>
    <tbody>
        <?php 
        $sr = 1;
        While($row=$result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $sr++; ?></td>
            <td><?php echo $row['bus_no'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo date("d-M-y h:i A", strtotime($row['start_time'])) .' - '. date("d-M-y h:i A", strtotime($row['reached_time'])) ?></td>
            <td><?php echo $row['total_tickets'] ?></td>
            <?php if($row['status'] == 0){ ?>
            <td class="pend">Not-Paid</td>
            <?php }elseif($row['status'] == 1){ ?>
                <td class="comp">Confirm</td>
                <?php }elseif($row['status'] == 2){ ?>
                    <td class="pend">Cancelled</td>
                    <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>

</div>
</body>

</html>