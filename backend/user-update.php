<?php
include_once('../database/connection.php');
session_start();

//inactive user
if(isset($_GET['inactive'])){
    $user_id = $_GET['inactive'];
    $status = 0;

    $stmt=$connection->prepare("UPDATE users SET status = ? WHERE id = ?");
    $stmt->bind_param("ss",$status,$user_id);
    if($stmt->execute()){
        echo "<script>alert('User Account Is Inactive')
        window.location='userslist.php';
        </script>";
    }
}

//active user
if(isset($_GET['active'])){
    $userid = $_GET['active'];
    $active_status = 1;

    $stmt1=$connection->prepare("UPDATE users SET status = ? WHERE id = ?");
    $stmt1->bind_param("ss",$active_status,$userid);
    if($stmt1->execute()){
        echo "<script>alert('User Account Is Active')
        window.location='userslist.php';
        </script>";
    }
}

//available bus
if(isset($_GET['activebus'])){
    $busid = $_GET['activebus'];
    $active_b_status = 1;

    $stmt2=$connection->prepare("UPDATE buses SET status = ? WHERE id = ?");
    $stmt2->bind_param("ss",$active_b_status,$busid);
    if($stmt2->execute()){
        echo "<script>alert('Bus Is Available Now')
        window.location='buses.php';
        </script>";
    }
}

//unavailable bus
if(isset($_GET['inactivebus'])){
    $bus_id = $_GET['inactivebus'];
    $inactive_b_status = 0;

    $stmt3=$connection->prepare("UPDATE buses SET status = ? WHERE id = ?");
    $stmt3->bind_param("ss",$inactive_b_status,$bus_id);
    if($stmt3->execute()){
        echo "<script>alert('Bus Is Un-Available Now')
        window.location='buses.php';
        </script>";
    }
}
?>