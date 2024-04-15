<?php
include_once('database/connection.php');

if($_POST['request']){

    $id = $_POST['id'];

    $stmt=$connection->prepare("SELECT cost FROM schedules WHERE id = ?");
    $stmt->bind_param("s",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    echo $row['cost'];
}

?>