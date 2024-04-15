<?php

include_once('database/connection.php');
session_start();



if(isset($_POST['submit'])){
   
    // $start_point=$_POST['start_location'];
    // $end_point=$_POST['end_location'];

    //$added_by=$_POST['AddedBy'];
    $route_id=$_POST['routeId'];
    $bus_id=$_POST['BusId'];
    $description=$_POST['Description'];
    $start_time=$_POST['StartTime'];
    $reached_time=$_POST['ReachedDate'];
    $status=$_POST['Status'];
    $added_at=$_POST['AddDate'];
    $total_seats=$_POST['TotalSeats'];
    $available_seats=$_POST['AvailableSeats'];
    $cost=$_POST['Cost'];
    $handicap_seats=$_POST['HandicapSeatingCapacity'];


    $stmt=$connection->prepare("INSERT INTO schedules (added_by,route_id,bus_id,description,start_time,reached_time,status,added_at,total_seats,available_seats,cost,handicap_seats) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("iiisssisiiii",$_SESSION['user']['id'],$route_id,$bus_id,$description,$start_time,$reached_time,$status,$added_at,$total_seats,$available_seats,$cost,$handicap_seats);
    if($stmt->execute()){
        echo "<script>alert('Thanx ! your schedules are added.')
        </script>";
    }
}

include_once('include/header.php');
?>

<body>
<form method="post" action="">
			
<!-- <label for="AddedBy">AddedBy:</label>
    <input type="number" name="AddedBy" id="AddedBy" required><br> -->

    <label for="BusId">BusId:</label>
    <input type="number" name="BusId" id="BusId" required><br>

    <label for="routeId">routeId:</label>
    <input type="number" name="routeId" id="routeId" required><br>

    <label for="Description">Description:</label>
    <input type="text" name="Description" id="Description" required><br>

    <label for="StartTime">StartTime:</label>
    <input type="date" name="StartTime" id="StartTime" required><br>

    <label for="ReachedDate">ReachedDate:</label>
    <input type="date" name="ReachedDate" id="ReachedDate" required><br>

    <label for="Status">Status:</label>
    <input type="number" name="Status" id="Status" required><br>

    <label for="AddDate">AddDate:</label>
    <input type="date" name="AddDate" id="AddDate" required><br>

    <label for="TotalSeats">TotalSeats:</label>
    <input type="number" name="TotalSeats" id="TotalSeats" required><br>

    <label for="AvailableSeats">AvailableSeats:</label>
    <input type="number" name="AvailableSeats" id="AvailableSeats" required><br>

    <label for="HandicapSeatingCapacity">Handicap Seating Capacity:</label>
    <input type="number" name="HandicapSeatingCapacity" id="HandicapSeatingCapacity" required><br>

    <label for="Cost">Cost:</label>
    <input type="number" name="Cost" id="Cost" required><br>

    <input type="submit" name="submit" value="Add Schedule">
		</form>
	
</body>

<?php
include_once('include/footer.php');
?>

