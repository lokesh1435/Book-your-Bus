<?php
include_once('../database/connection.php');

if($_POST['request']){

    $id = $_POST['id'];
    
    $stmt=$connection->prepare("SELECT added_by,seating_capacity FROM buses WHERE id = ?");
    $stmt->bind_param("s",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();
    
    echo json_encode($row);
    // echo $row['added_by'];
}

?>