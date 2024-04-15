<?php
include_once('database/connection.php');

//cancel booking after payment
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql1 = "SELECT s.available_seats,b.total_tickets,s.id AS s_id
    FROM bookings b
    INNER JOIN schedules s ON s.id = b.schedule_id
    WHERE b.id = " .$id;

    $stmt1=$connection->prepare($sql1);
    $stmt1->execute();
    $result1=$stmt1->get_result();
    $row1=$result1->fetch_assoc();

    $status = 2;
    $stmt=$connection->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $stmt->bind_param("ss",$status,$id);
    if($stmt->execute()){

        $seats = $row1['available_seats'] + $row1['total_tickets'];
        $stmt2=$connection->prepare("UPDATE schedules SET available_seats = ? WHERE id = ?");
        $stmt2->bind_param("ss",$seats,$row1['s_id']);
        $stmt2->execute();

        echo "<script>alert('Your Booking Is Cancelled')
        window.location='my-bookings.php';
        </script>";
    }

}

?>