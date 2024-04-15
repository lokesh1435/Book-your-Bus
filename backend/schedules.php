<?php
include_once('../database/connection.php');
session_start();

$sql = "SELECT b.bus_no,b.image,r.start_point,r.end_point,s.*
FROM schedules s
INNER JOIN buses b ON b.id = s.bus_id
INNER JOIN routes r ON r.id = s.route_id";

if($_SESSION['admin']['role'] != 'admin'){
    $sql = $sql .' WHERE s.added_by = '. $_SESSION['admin']['id']; 
}

$stmt=$connection->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();

include_once('include/header.php');
include_once('include/sidebar.php');
?>
<div class="heading">
    <h2>Schedules</h2>
    <?php if($_SESSION['admin']['role'] == 'busoperator'){ ?>
    <a href="add-schedules.php" class="btns">Add New Schedule</a>
    <?php } ?>
</div>
<div class="table-container">
<table>
    <thead>
        <tr>
            <th>Sr. No</th>
            <th>Image</th>
            <th>Bus No</th>
            <th>Route</th>
            <th>Timings</th>
            <th>Total Seats</th>
            <th>Available Seats</th>
            <th>Cost</th>
            <th>Description</th>
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
            <td><img src="./busimages/<?php echo $row['image']; ?>" height="200"></td>
            <td><?php echo $row['bus_no']; ?></td>
            <td><?php echo $row['start_point']."-". $row['end_point']; ?></td>
            <td><?php echo date("d/M/y h:i:s A",strtotime($row['start_time']))." TO ". date("d/M/y h:i:s A",strtotime($row['reached_time'])); ?></td>
            <td><?php echo $row['total_seats'] ?></td>
            <td><?php echo $row['available_seats'] ?></td>
            <td><?php echo $row['cost'] ?></td>
            <td><?php echo $row['description'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>

</div>
</body>

</html>